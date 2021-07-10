<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Post;
use App\Http\Requests\CommentRequest as CommentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::with('post')->get();

        return view('admin.comments.index',compact('comments'));

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'body' =>'required|min:3|max:5000',
        ]);

        $user = Auth::user();

        $data = [

            'post_id'=> $request->post_id,
            'author' => $user->full_name,
            'email'  => $user->email,
            // 'photo'  => $user->photo->file,
            'body'   => $request->body,

        ];
        Comment::create($data);

        $request-> session()->flash('comment_message','Your Message has been Submitted and is waiting moderation');

        return redirect()->back();
    }


    public function createUnloggedUserComment(CommentRequest $request)
    {

        Comment::create($request->all());

        $request-> session()->flash('comment_message','Your Message has been Submitted and is waiting moderation');

        return redirect()->back();

    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        $comments = $post->comments()->with('post')->get();  // Eager - load

        return view('admin.comments.show', compact('comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Comment::findOrFail($id)->update($request->all());

        return redirect('/admin/comments');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::findOrFail($id)->delete();

        return redirect()->back();
    }
}

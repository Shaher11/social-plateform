<?php

namespace App\Http\Controllers;

use App\Category;
use App\Photo;
use App\Post;
use App\Quote;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('user', 'category', 'tags', 'comments', 'photo')->paginate(10);

        // $quotes = Quote::pluck('quote', 'id')->all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::where('enable',1)->pluck('name','id')->all();
      
        $users = User::where('role_id', 1)->pluck('full_name', 'id')->all();

        return view('admin.posts.create', compact('tags', 'users', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = [

            'user_id'   => $request->user_id,
            'status'    => $request->status,
            'title'     => $request->title,
            'body'      => $request->body,
            'category_id' => $request->category_id

        ];


        if ($file = $request->file('photo_id')) {

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file' => $name]);

            $input['photo_id'] = $photo->id;
        }


        $post = Post::create($input);

        $post->tags()->sync($request->tags, false);

        //  <strong>Holy guacamole!</strong> Best check yo self, you're not looking too good.

        $request->session()->flash('post_message', ' The Post Created Successfully! ');


        return redirect('/admin/posts');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        $tags = Tag::all();
        $categories = Category::where('enable',1)->pluck('name','id')->all();
        $users = User::where('role_id', 1)->pluck('full_name', 'id')->all();


        return view('admin.posts.edit', compact('post', 'tags', 'users', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function add_to_latest(Request $request, $id)
    {

        $post = Post::findOrFail($id);

        if (Post::where('recent', 1)->count() < 3) {

            $post->update($request->all());

            $post->tags()->sync($request->tags, false);

            $request->session()->flash('post_edit_message', ' The Post Edited Successfully! ');

            return redirect('/admin/posts');
        } elseif ($request->recent == 0) {

            $post->update($request->all());

            $post->tags()->sync($request->tags, false);

            $request->session()->flash('post_edit_message', ' The Post Edited Successfully! ');

            return redirect('/admin/posts');
        } else {
            $request->session()->flash('post_edit_message', 'Already 3 Latest Exist ');

            return redirect('/admin/posts');
        }
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $input = $request->only(['user_id', 'status', 'title', 'body', 'category_id']);
        $post->update($input);

        if ($file = $request->file('photo_id')) {

            $name = time() . $file->getClientOriginalName();

            $file->move('images', $name);

            $photo = Photo::create(['file' => $name]);

            $post->photo_id = $photo->id;
            $post->save();
        }

        $post->tags()->sync($request->tags, false);

        $request->session()->flash('post_edit_message', ' The Post Edited Successfully! ');


        return redirect('/admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        session()->flash('post_delete_message', ' The Post Deleted Successfully! ');

        return redirect()->back();
    }

    public function search(Request $request)
    {
        if($request->ajax())
        {
            if(isset($request->search)){
                $posts = Post::with('user', 'tags', 'comments', 'photo')->where('title', 'LIKE','%'.$request->search."%")->get();
                return view('components.search.postsSearch', compact('posts'));
            }
            else {
                $posts = Post::with('user', 'tags', 'comments', 'photo')->paginate(10);
                return view('components.search.postsSearch', compact('posts'));
            }
        }
    }
}
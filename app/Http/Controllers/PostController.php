<?php

namespace App\Http\Controllers;

use App\Category;
use App\Tag;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user', 'tags', 'photo', 'category')->where('status', 1)->paginate(6);
        // dd($posts);
        return view('blog-post', ['posts' => $posts]);
    }

    public function show(Post $post)
    {
        $posts = Post::with('user', 'tags', 'photo', 'category')->where('status', 1)->paginate(3);
        $recent_post = Post::where('recent', 1)->with('photo')->get();

        $tags = Tag::all();

        $categories = Category::where('enable', 1)->get();

        $comments = $post->comments()->where('status', 1)->with('replies', 'photo')->get();


        return view('single-blog-post', ['post' => $post], compact('comments', 'posts', 'tags', 'categories', 'recent_post'));
    }


    public function search(Request $request)
    {
        if ($request->ajax()) {
            if (isset($request->search)) {
                $posts = Post::with('user', 'tags', 'comments', 'photo', 'category')->where('title', 'LIKE', '%' . $request->search . "%")->get();
                if (count($posts) == 0) {
                    // return "Empty";
                    $cats = Category::with('posts')->where('name', $request->search)->get()->pulk('posts');
                    // return view('components.search.blogSearch', compact('posts'));
                }

                return view('components.search.blogSearch', compact('posts'));
            } else {
                $posts = Post::with('user', 'tags', 'comments', 'photo', 'category')->paginate(10);
                return view('components.search.blogSearch', compact('posts'));
            }
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class AdminTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();

        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
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
            'name' =>'required|unique:tags,name|alpha|min:3|max:5000',
        ]);

        Tag::create($request->all());

        $request-> session()->flash('tag_message',' The Tag Created Successfully! ');

        return redirect()->route('admin.tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
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
        // dd($request->all());
        $request->validate([
            'name' => 'alpha|unique:tags,name,'.$id,
        ]);

        Tag::findOrFail($id)->update($request->all());

        $request-> session()->flash('tag_message',' The Tag Edited Successfully! ');


        return redirect()->route('admin.tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->posts()->delete();
        $tag->delete();
        session()->flash('tag_message',' The Tag Deleted Successfully! ');

        return redirect()->route('admin.tags.index');
    }

    public function search(Request $request)
    {
        if($request->ajax())
        {
            if(isset($request->search)){
                $tags = Tag::where('name', 'LIKE','%'.$request->search."%")->get();

                return view('components.search.tagsSearch', compact('tags'));
            }
            else {
                $tags = Tag::all();
                return view('components.search.tagsSearch', compact('tags'));
            }
        }
    }
}

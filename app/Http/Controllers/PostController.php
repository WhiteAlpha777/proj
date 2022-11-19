<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()             //+
    {//get
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    public function recycle()             //+
    {//get
        $posts = Post::onlyTrashed()->get();
        return view('post.recycle', compact('posts'));
    }

    public function create()            //+
    {//get
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('categories','tags'));
    }

    public function store()             //-
    {//post
        $data = request()->validate([
            'title'=>'required|string',
            'content'=>'string',
            'image'=>'string',
            'category_id'=>'',
            'tags'=>''
        ]);
        $tags = $data['tags'];
        unset($data['tags']);
        /*dump($tags);
        dd($data);*/
        $posts = Post::create($data);
        $posts->tags()->attach($tags);
        return redirect()->route('post.index');
    }

    public function edit(Post $post)    //+ Page
    {//get
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact('post','categories','tags'));
    }

    public function update(Post $post)  //- Button
    {//patch
        $data = request()->validate([
            'title'=>'string',
            'content'=>'string',
            'image'=>'string',
            'category_id'=>'',
            'tags'=>''
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);
        return redirect()->route('post.show', $post->id);
    }

    public function restore()             //- Button
    {//post
        Post::onlyTrashed()->restore();
        return redirect()->route('post.recycle');
    }

    public function show(Post $post)    //+ Page
    {//get
        return view('post.show',compact('post'));
    }

    public function destroy(Post $post) //-
    {//delete
        $post->delete();
        return redirect()->route('post.index');
    }
}

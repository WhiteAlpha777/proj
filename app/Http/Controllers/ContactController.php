<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function index()
    {
//      $posts = Post::all();
        //1
        $get_posts = Post::find(1);//1
        $tags = $get_posts->tags;//1
        //2
        $tag = Tag::find(1);//2
        $posts = $tag->posts;//2
        return view('contacts', compact('posts','tags'));
    }
}

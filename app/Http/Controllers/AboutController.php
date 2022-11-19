<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    public function index()
    {
        //$posts = Post::all();
        //$category = Category::all();
        $category = Category::find(1);
        $posts = $category->posts;

        return view('about', compact('posts'));
    }
}

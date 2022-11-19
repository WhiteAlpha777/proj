<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class RecycleController extends BaseController
{
    public function __invoke()
    {
        // TODO: Implement __invoke() method.
        $posts = Post::onlyTrashed()->get();
        return view('post.recycle', compact('posts'));
    }
}

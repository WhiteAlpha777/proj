<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class RestoreController extends BaseController
{
    public function __invoke()
    {
        // TODO: Implement __invoke() method.
        Post::onlyTrashed()->restore();
        return redirect()->route('post.recycle');
    }
}

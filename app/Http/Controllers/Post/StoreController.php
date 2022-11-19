<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        // TODO: Implement __invoke() method.
        $data = $request->validated();
        $post = $this->service->store($data);
        //на основе $post создаст объект ресурса для передачи

        return $post instanceof Post ? new PostResource($post) : $post;

        //return redirect()->route('post.index');
    }
}

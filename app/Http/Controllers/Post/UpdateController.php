<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        // TODO: Implement __invoke() method.
        $data = $request->validated();
        //dd($data);

        $this->service->update($data, $post);
        //на основе $post создаст объект ресурса для передачи
        return $post instanceof Post ? new PostResource($post) : $post;

        //return redirect()->route('post.show', $post->id);
    }
}

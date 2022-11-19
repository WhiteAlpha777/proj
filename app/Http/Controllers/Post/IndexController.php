<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;

class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        // TODO: Implement __invoke() method.
        //$posts = Post::all();
//        $posts = Post::paginate(5);
        $data = $request->validated();

        /*$query = Post::query();

        if(isset($data['title'])){
            $query->where('title','like',"%{$data['title']}%");
        }
        if(isset($data['content'])){
            $query->where('content','like',"%{$data['content']}%");
        }
        if(isset($data['category_id'])){
            $query->where('category_id',$data['category_id']);
        }
        $posts = $query->paginate();//*/
        $filter=app()->make(PostFilter::class,['queryParams' => array_filter($data)]);//aray_filter() - удаляет пустые поля

        $page = $data['page'] ?? 1;
        $perPage = $data['per_page'] ?? 5;
        $posts=Post::filter($filter)->paginate($perPage,['*'],'page', $page);
        //статический метод collection вызывается если не один пост, а несколько (многомерный массив)
        return PostResource::collection($posts);

        return view('post.index', compact('posts'));
    }
}

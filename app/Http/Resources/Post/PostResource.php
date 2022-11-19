<?php

namespace App\Http\Resources\Post;

use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Tag\TagResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [//в ресурс приходят данные в виде контента, значит их можно взять через this
            'id' => $this->id,
            'title'	=> $this->title,
			'content'=> $this->content,
			'image' => $this->image,
            'category' => new CategoryResource($this->category),
            'tags' => TagResource::collection($this->tags)
		];
    }
}

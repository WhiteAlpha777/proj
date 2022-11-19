<?php


namespace App\Services\Post;


use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class Service
{
    public function store($data){
        try {
            Db::beginTransaction();

            $tags = $data['tags'];
            $category = $data['category'];
            unset($data['tags'],$data['category']);

            $tagIds = $this->GetTagIds($tags);
            $data['category_id'] = $this->GetCategoryIds($category);

            $posts = Post::create($data);
            $posts->tags()->attach($tagIds);

            Db::commit();
        } catch (\Exception $exception) {
            Db::rollBack();
            return ($exception->getMessage());
        }
        return $posts;
    }
    private function GetCategoryIds($item)
    {
        $category = !isset($item['id']) ? Category::create($item) : Category::find($item['id']);
        return $category->id;
    }

    private function GetTagIds($tags)
    {
        $tagIds = [];
        foreach ($tags as $tag) {
            $tag = !isset($tag['id']) ? Tag::create($tag) : Tag::find($tag['id']);
            $tagIds[] = $tag->id;
        }
        return $tagIds;
    }

    public function update($data, $post){
        try {
            Db::beginTransaction();

            $tags = $data['tags'];
            $category = $data['category'];
            unset($data['tags'], $data['category']);

            $tagIds = $this->GetTagWithUpdateIds($tags);
            $data['category_id'] = $this->GetCategoryWithUpdateIds($category);

            $post->update($data);
            $post->tags()->sync($tagIds);

            Db::commit();
        }catch (\Exception $exception) {
            Db::rollBack();
            return ($exception->getMessage());
        }

        return $post->fresh();
    }

    private function GetTagWithUpdateIds($tags)
    {
        $tagIds = [];
        foreach ($tags as $tag) {
            if (!isset($tag['id'])) {
                $tag = Tag::create($tag);
            }else{
                $currentTag = Tag::find($tag['id']);
                $currentTag->update($tag);
                $tag = $currentTag->fresh();
            }
            $tagIds[] = $tag->id;
        }
        return $tagIds;
    }

    private function GetCategoryWithUpdateIds($item)
    {
        if(!isset($item['id'])){
            $category = Category::create($item);
        }else{
            $category = Category::find($item['id']);
            $category->update($item);
            $category = $category->fresh();
        }

        return $category->id;
    }
}

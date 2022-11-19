<?php

namespace App\Models;


use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use Filterable;
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];//разрешить добавлять новые записи в таблицу

    public function Category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class,'post_tags','post_id','tag_id');
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];
    public function PostsCategory()
    {
        return $this->belongsTo(Posts_category::class, 'posts_category_id');
    }
    public function writer(){
        return $this->belongsTo(writer::class , 'writer_id');
    }
    public function tags(){
        return $this->belongsToMany(Tag::class , 'post_tag');
    }

}
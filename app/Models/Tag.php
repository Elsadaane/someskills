<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded =[];
    public function Tag_Posts(){
        return $this->belongsToMany(Post::class , 'post_tag');
    }
}
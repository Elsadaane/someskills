<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts_category extends Model
{
    /** @use HasFactory<\Database\Factories\PostsCategoryFactory> */
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}

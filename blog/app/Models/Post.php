<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'title', 'excerpt', 'body'];


    public function category()
    {
        # assuming post has only one category
        return $this->belongsTo(Category::class);
    }
}

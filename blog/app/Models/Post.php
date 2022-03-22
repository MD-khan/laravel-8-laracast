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


    public function author()
    {
        # a post has only one user
        return $this->belongsTo(User::class, 'user_id'); #over writing the id
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'title', 'excerpt', 'body'];

    # Post will be fetch wiht author and category
    # This also solve the n+1 problem
    #This is the same as in 
    # 'posts' => $author->posts->load(['category', 'author'])
    # 'posts' => Post::latest()->get() 
    # --> if dont want to fetch category or author
    # use witout method
    # App\Models\Post::without('author')->first()
    protected $with = ['category', 'author'];



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

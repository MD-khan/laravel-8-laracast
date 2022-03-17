<?php

namespace App\Models;

class Post 
{

    public static function find($slug) {
    
        $path = resource_path("posts/{$slug}.html");
        if ( ! file_exists($path)) {
    
            throw new ModelNotFoundException();
        }

        return cache()->remember("post.{$slug}", 5, fn() => file_get_contents($path));
    
    }
}

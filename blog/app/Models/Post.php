<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{
    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }
    public static function all()
    {
        $files = File::files(resource_path("posts/"));
        # Approach 1
        // return array_map(function ($files) {
        //     return $files->getContents();
        // }, $files);

        return array_map(fn ($files) => $files->getContents(), $files);
    }
    public static function find($slug)
    {

        $path = resource_path("posts/{$slug}.html");
        if (!file_exists($path)) {

            throw new ModelNotFoundException();
        }

        return cache()->remember("post.{$slug}", 5, fn () => file_get_contents($path));
    }
}

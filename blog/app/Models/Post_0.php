<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use \Spatie\YamlFrontMatter\YamlFrontMatter;
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
        return collect(File::files(resource_path("posts/")))
            ->map(function ($file) {
                $document = YamlFrontMatter::parseFile($file); # ignore the red line, its working
                return new Post(
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(), # we need to call the body method
                    $document->slug
                );
            })->sortByDesc('date'); # last post first
    }

    public static function find($slug)
    {
        return static::all()->firstWhere('slug', $slug);
    }

    public static function findOrFail($slug)
    {
        $post = static::find($slug);

        if (!$post) {
            throw new ModelNotFoundException();
        }

        return $post;
    }
}

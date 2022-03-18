<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    # Approach 1
    // $files = File::files(resource_path("posts/"));
    // $posts = [];
    // foreach ($files as $file) {
    //     $document = YamlFrontMatter::parseFile($file); # ignore the red line, its working
    //     $posts[] = new Post(
    //         $document->title,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body,
    //         $document->slug
    //     );
    // }

    # Approach 2 : array_map
    // $files = File::files(resource_path("posts/"));
    // $posts = array_map(function ($files) {
    //     $document = YamlFrontMatter::parseFile($files); # ignore the red line, its working
    //     return new Post(
    //         $document->title,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body,
    //         $document->slug
    //     );
    // }, $files);

    # Approach 3 : Collection
    #$files = File::files(resource_path("posts/"));
    // $posts = collect(File::files(resource_path("posts/")))
    //     ->map(function ($file) {
    //         $document = YamlFrontMatter::parseFile($file); # ignore the red line, its working
    //         return new Post(
    //             $document->title,
    //             $document->excerpt,
    //             $document->date,
    //             $document->body,
    //             $document->slug
    //         );
    //     });

    return view('posts', [
        'posts' => Post::all()
    ]);
});


Route::get('/posts/{post}', function ($slug) {
    # find a post by its slug and pass it to a view called "post"
    return view('post', [
        'post' => Post::findOrFail($slug)
    ]);
});

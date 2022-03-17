<?php

use Illuminate\Support\Facades\Route;

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
    return view('posts');
});


Route::get('/posts/{post}', function ($slug) {
    #return $slug;"
    $path = __DIR__."/../resources/posts/{$slug}.html";

    if ( ! file_exists($path)) {
        #ddd("file not exits");
        #abort(404);
        return redirect('/');
    }

    # Using cache for expensive operation
    // $post = cache()->remember("post.{$slug}", now()->addMinutes(2), function() use ($path) {
    //     #var_dump('file_get_contents($path)');
    //     return file_get_contents($path);
    // });
    $post = cache()->remember("post.{$slug}", 5, fn() => file_get_contents($path));
    return view('post', ['post' => $post]);
    #return view('post', $post);
});
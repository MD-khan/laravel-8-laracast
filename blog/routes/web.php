<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;


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

Route::get('/', [PostController::class, 'index'])->name('home');

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


// \Illuminate\Support\Facades\DB::listen(function ($query) {
//     logger($query->sql);
// });


//     return view('posts', [
//         #'posts' => Post::all() # this will cause the n+1 issue
//         'posts' => Post::latest()->get(), # this is the solution
//         'categories' => Category::all()
//     ]);
// })->name('home');

# post by id
// Route::get('/posts/{post}', function (Post $post) {
//     # find a post by its slug and pass it to a view called "post"
//     return view('post', [
//         'post' => $post
//     ]);

# Post by post slug
Route::get('/posts/{post:slug}', [PostController::class, 'show']);
//     # find a post by its slug and pass it to a view called "post"
//     return view('post', [
//         'post' => $post,
//         'categories' => Category::all()
//     ]);
// });

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', [
        // 'posts' => $category->posts # This line cases the n+1 problem
        'posts' => $category->posts,  # this is the solutuon
        'currentCategory' => $category,
        'categories' => Category::all()
    ]);
})->name('category');

# author
Route::get('/authors/{author:username}', function (User $author) {

    return view('posts', [
        //'posts' => $author->posts  # This line cases the n+1 problem
        'posts' => $author->posts->load(['category', 'author']) # this is the solutuon
    ]);
});

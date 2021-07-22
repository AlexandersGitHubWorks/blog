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
    $files = scandir(__DIR__ . "/../resources/posts");
    $files = array_diff($files, ['.', '..']);

    foreach ($files as $file) {
        $posts[] = file_get_contents(__DIR__ . "/../resources/posts/$file");
    }

    return view('posts', compact('posts'));
});

Route::get('/post/{slug}', function ($slug) {
    if (! file_exists($file = __DIR__ . "/../resources/posts/$slug.html")) {
        return redirect('/');
    }

    $post = cache()->remember("post.{$slug}", now()->addMinute(), fn() => file_get_contents($file));

    return view('post', compact('post'));
})->where('slug', '[A-z_\-]+');

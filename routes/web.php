<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController ;

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
    return view('welcome');
});

Route::get('/posts',[PostsController::class,"index"])->name("posts.index");
Route::post('/posts',[PostsController::class,"store"])->name("posts.store");

Route::get('/posts/add',[PostsController::class,"add"])->name("posts.add");

Route::get("/posts/view/{id}",[PostsController::class,"view"])->name("posts.view");

Route::get('/posts/update/{id}',[PostsController::class,"edit"])->name("posts.edit");
Route::put('/posts/update/{id}',[PostsController::class,"update"])->name("posts.update");

Route::delete('/posts/{id}',[PostsController::class,"destroy"])->name("posts.destroy");


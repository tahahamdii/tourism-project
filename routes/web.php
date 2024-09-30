<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PostController;
use App\Models\Category;
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
Route::get('/post/{abode}' , [PostController::class,"show"]);
Route::get('/' , [PostController::class,"index"]);
Route::get('/' , [PostController::class,"search"]);
Route::get('/categories/{category:slug}',function(Category $category)
{
    return view ('posts' , ['posts' => $category->posts]);
});

// middleware to make filtter to users
Route::get('/register' , [RegisterController::class,"create"])->middleware('guest');  // route to git the form that user deal with it
Route::post('/register' , [RegisterController::class,"store"])->middleware('guest');  // this route to take the data from the form
//and make validate and stor it in the database

Route::post('/logout' , [AuthController::class,"destroy"])->middleware('auth');

Route::get('/login' , [AuthController::class,"create"])->middleware('guest');  // route to git the form that user deal with it
Route::post('/login' , [AuthController::class,"store"])->middleware('guest');


Route::get('showpost/{id}', [postcontroller::class,"show"] );


Route::post('/posts', [PostController::class, 'store'])->name('posts.store');// الراوت الخاص باستدعاء دالة تخزين البيانات
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');// الروات الخاص باستدعاء الفيو الخاص بالفرم التعديل
Route::patch('/posts/{id}', [PostController::class, 'update'])->name('posts.update');// الراوت الخاص باخذ البيانات بعد التعديل

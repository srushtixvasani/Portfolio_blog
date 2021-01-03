<?php

use Illuminate\Support\Facades\Route;

//need to specify due to laravel 8 
use App\Http\Controllers\PagesController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ROUTE TO LOGIN , REGISTER A USER TO OPEN BLOG APP
Route::get('/', 'App\Http\Controllers\PagesController@index');

// use full namespaces controller name

// Route::get('/', 'App\Http\Controllers\SiteController@index');

// ROUTES FOR SITE HOME PAGES WITH BLOG POSTS AND USER BLOG PAGE, ONCE USER HAS LOGGED IN.
Route::get('contact', 'App\Http\Controllers\SiteController@contact');
Route::post('contact', 'App\Http\Controllers\SiteController@contactfunc');
Route::get('/home', ['uses' => 'App\Http\Controllers\SiteController@index', 'as' => 'pages.central']);
// Route::get('logout', 'App\Http\Controllers\Auth\LoginController@logout')

// Route::get('/portfolio-home', 'App\Http\Controllers\SiteController@index');

Route::group(['middleware' => 'auth'], function()
{
    // ROUTES TO ADD, EDIT AND DELETE POSTS
    Route::get('create', 'App\Http\Controllers\PostController@create');
    Route::resource('posts', 'App\Http\Controllers\PostController');
    Route::resource('categories', 'App\Http\Controllers\CategoryController', ['except' => ['create']]);

    // ROUTES TO ADD, EDIT AND DELETE COMMENTS
    Route::post('comments/{post_id}', ['uses' => 'App\Http\Controllers\CommentsController@store', 'as' => 'comments.store']);
    Route::get('comments/{id}/edit', ['uses' => 'App\Http\Controllers\CommentsController@edit', 'as' => 'comments.edit']);
    Route::put('comments/{id}/update', ['uses' => 'App\Http\Controllers\CommentsController@update', 'as' => 'comments.update']);
    Route::put('comments/{id}', ['uses' => 'App\Http\Controllers\CommentsController@destroy', 'as' => 'comments.destroy']);
    Route::get('comments/{id}/delete', ['uses' => 'App\Http\Controllers\CommentsController@delete', 'as' => 'comments.delete']);
});

// ROUTE FOR SLUGS IN BLOG POSTS
Route::get('blog/{slug}', ['as' => 'blog.comment', 'uses' => 'App\Http\Controllers\BlogController@comment']);
Route::get('blog', ['uses' => 'App\Http\Controllers\BlogController@index', 'as' => 'blog.index']);


// ROUTE FOR TAGS
Route::resource('tags', 'App\Http\Controllers\TagController', ['except' => ['create']]);

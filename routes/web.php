<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyPlaceController;
use App\Http\Controllers\PostController;

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

/*Route::get('/', function () {
    return view('welcome');
});//*/
///*Auth::routes();
Route::get('/',[HomeController::class,'index'])->name('home');
//Route::get('/','App\Http\Controllers\Admin\Post\HomeController@index');
//Route::get('/home', [HomeController::class,'index']);*/

Route::group(['namespace' => 'App\Http\Controllers\Post'], function (){

    Route::get('/posts', 'IndexController')->name('post.index');
    Route::get('/posts/recycle', 'RecycleController')->name('post.recycle');
    Route::post('/posts/recycle', 'restoreController')->name('post.restore');

    Route::get('/posts/create', 'CreateController')->name('post.create');
    Route::post('/posts', 'StoreController')->name('post.store');
    Route::get('/posts/{post}', 'ShowController')->name('post.show');
    Route::get('/posts/{post}/edit', 'EditController')->name('post.edit');
    Route::patch('/posts/{post}', 'UpdateController')->name('post.update');
    Route::delete('/posts/{post}', 'DestroyController')->name('post.delete');

    });

Route::group(['namespace' => 'App\Http\Controllers\Admin','prefix'=>'admin', 'middleware'=>'admin'], function (){
    Route::group(['namespace' => 'Post'], function (){
        Route::get('/post', 'IndexController')->name('admin.post.index');
        });
	});


Route::get('/posts/update', [PostController::class, 'update']);

Route::get('/main', [MainController::class, 'index'])->name('main.index');
Route::get('/contacts', [ContactController::class, 'index'])->name('contact.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



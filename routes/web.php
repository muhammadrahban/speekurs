<?php

use Illuminate\Support\Facades\Route;
use BookmarkController as AdminBookmarkController;
use CategoryController as AdminCategoryController;
use CommentController as AdminCommentController;
use FeaturePostController as AdminFeaturePostController;
use LikeController as AdminLikeController;
use PostController as AdminPostController;
use PageController as AdminPageController;


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

Route::get('/', 'WelcomeController@index');
Route::get('/bookmark', 'WelcomeController@getbookmark');
Route::get('/getpost/{cat}/{id}', 'WelcomeController@getPost');
Route::get('/page/{slug}', 'WelcomeController@getPage');
Route::get('/singlepost/{id}', 'WelcomeController@singlepost');
Route::post('/setLike', 'WelcomeController@setLike');
Route::post('/setCommentLike', 'WelcomeController@setCommentLike');
Route::get('/search/{char}', 'WelcomeController@search');
Route::post('/sebookmark', 'WelcomeController@sebookmark');
Route::post('/setComment', 'WelcomeController@setComment');
Route::get('/getComments/{id}', 'WelcomeController@getComments');

Route::view('/primary_policy', 'primary_policy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/setting', 'ProfileController@profile')->name('profile');
Route::post('/setting', 'ProfileController@setprofile')->name('setprofile');
Route::get('/account', 'ProfileController@account')->name('account');
Route::post('/account', 'ProfileController@setaccount')->name('setaccount');
Route::post('/deactive', 'ProfileController@deactive')->name('deactive');

Route::namespace("Admin")->prefix('admin')->group(function(){
	Route::namespace('Auth')->group(function(){
		Route::get('/login', 'LoginController@showLoginForm')->name('admin.login');
		Route::post('/login', 'LoginController@login');
        Route::post('logout', 'LoginController@logout')->name('admin.logout');
	});

    Route::get('/', 'AdminController@index')->name('admin.home');
    Route::resource('/bookmark', AdminBookmarkController::class);
    Route::resource('/category', AdminCategoryController::class);
    Route::resource('/comment',  AdminCommentController::class);
    Route::resource('/featurepost', AdminFeaturePostController::class);
    Route::resource('/like', AdminLikeController::class);
    Route::resource('/post', AdminPostController::class);
    Route::resource('/page', AdminPageController::class);

    Route::get('/users', 'UserController@index')->name('admin.user.index');
    Route::get('/setting', 'UserController@setting')->name('admin.setting');
    Route::post('/setting', 'UserController@setetting')->name('admin.update.setting');
    Route::get('/edit/{id}', 'UserController@edit')->name('admin.user.edit');
    Route::patch('/update/{id}', 'UserController@update')->name('admin.user.update');
    Route::get('/users/activity/{id}', 'UserController@getactivity')->name('admin.user.activity');
    Route::post('/users/deleteActivity', 'UserController@deleteActivity')->name('admin.user.activity.delete');
});

Route::get('login/{provider}', 'SocialController@redirect');
Route::get('login/{provider}/callback','SocialController@Callback');

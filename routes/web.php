<?php

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

// App::singleton('App\Billing\Stripe', function(){
//   return new \App\Billing\Stripe(config('services.stripe.secret'));
// });

// App::bind('App\Billing\Stripe', function(){
//   return new \App\Billing\Stripe(config('services.stripe.secret'));
// });

// $stripe = App::make('App\Billing\Stripe');
// $stripe = resolve('App\Billing\Stripe');
// $stripe = app('App\Billing\Stripe');

// dd($stripe);

Route::get('/', 'PostController@index')->name('home');
// Route::get('/home', 'PostController@index');
Route::get('/posts', 'PostController@index');
Route::get('/register', 'RegistrationController@create');
Route::get('/login', 'SessionController@create')->name('login');
Route::get('/logout', 'SessionController@destroy');
Route::get('/posts/create', 'PostController@create');
Route::get('/posts/{post}', 'PostController@show');
Route::get('/posts/{post}/{random_text}', 'PostController@show');

Route::post('/posts', 'PostController@store');
Route::post('/posts/{post}/comments', 'CommentController@store');
Route::post('/register', 'RegistrationController@store');
Route::post('/login', 'SessionController@store');

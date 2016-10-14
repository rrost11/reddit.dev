<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//Laravel Main Page
Route::get('/', 'HomeController@showWelcome');
Route::get('/sayhello/{name}', function ($name) {
	return "Hey Codeup Lassen Cohort!";
});
Route::get('/roll-dice/{guess}', 'HomeController@rollDice');
Route::get('/uppercase/{word}', 'HomeController@upperCase');
Route::get('/increment/{number}', 'HomeController@increment');
Route::get('/add/{number1}/{number2}', function ($number1, $number2) {
	return $number1 + $number2;
});
Route::get('/sayhello/{firstName}/{lastName}', function($firstName, $lastName)
{
    if ($firstName == "Chris") {
        return Redirect::to('/');
    }
    $data = [
    	'firstName' => $firstName,
    	'lastName' => $lastName
    ];
    return view('my-first-view', $data);
});
Route::get('/rolldice/{guess}', 'HomeController@rollDice');

//Post Controller
Route::resource('posts', 'PostsController');
Route::get('/posts', 'PostsController@index');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}', 'PostsController@show');
Route::get('/posts/{post}/edit', 'PostsController@edit');
Route::put('/posts/{post}', 'PostsController@update');
Route::delete('/posts/{post}', "PostsController@destroy");



//User Controller
Route::resource('posts', 'PostsController');
Route::resource('users', 'UsersController', ['except' => ['create', 'store']]);

// Test
Route::get('/orm-test', function(){
    $post = new Post();
    $post->created_by = 1;
    $post->title = 'Eloquent is awsome';
    $post->url = 'codeup.com';
    $post->content = 'some content stuff';
    $post->save();
    $post2 = new post();
    $post2->created_by = 1;
    $post2->title = 'title';
    $post2->url = 'google.com';
    $post2->content = 'some content stuff';
    $post2->save();
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

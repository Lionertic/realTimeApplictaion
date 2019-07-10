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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/chat', function () {
    return view('chat');
});

// Return all messages that will populate our chat messages
Route::get('/getAll','ChatController@getMessages');

// Allows us to post new message
Route::post('/post','ChatController@sendMessage');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('email-test', function(){

    $details['email'] = 'udayacharan.20cs@licet.ac.in';

    dispatch(new App\Jobs\SendEmailJob($details));

    dd('done');
});

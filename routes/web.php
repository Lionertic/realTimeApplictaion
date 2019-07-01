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

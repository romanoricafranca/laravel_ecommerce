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

//greetPerson
// Route::get('/sample', "SampleController@nameoftheFunction");
//nameofFruits
// Route::get('/fruits', "SampleController@nameofAnimals");


Route::get('/tasklist', 'TaskController@showTasks');

Route::post('/newtask', 'TaskController@addTasks');

Route::delete('/taskdelete/{id}', 'TaskController@deleteTasks'); //wildcard




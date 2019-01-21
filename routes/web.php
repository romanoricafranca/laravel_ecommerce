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


// Route::get('/tasklist', 'TaskController@showTasks');
// Route::post('/newtask', 'TaskController@addTasks');
// Route::delete('/taskdelete/{id}', 'TaskController@deleteTasks'); //wildcard
// Route::put('/taskupdate/{id}', 'TaskController@updateTasks');

//addtocartmethod



Route::post('/addToCart/{id}','ItemController@addToCart');
Route::get('/showcart', 'ItemController@showCart');
Route::delete('/menu/mycart/{id}/delete', 'ItemController@deletecart');
Route::get('/menu/clearCart', 'ItemController@clearCart');
Route::patch('/menu/mycart/{id}/changeqty', 'ItemController@updateCart');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware("auth")->group(function(){

	Route::get('/catalog', 'ItemController@showItems');
	Route::get('/menu/add', 'ItemController@showAdditemForm');
	Route::post('/menu/add', 'ItemController@saveItems');
	Route::get('/menu/{id}', 'ItemController@itemDetails');
	Route::delete('/menu/{id}/delete', 'ItemController@deleteItem');
	Route::get('/menu/{id}/edit', 'ItemController@showEditForm');
	Route::put('/menu/{id}/edit', 'ItemController@updateItem');


});

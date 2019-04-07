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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', 'DivisionController@index');

Route::get('get-district-list','DivisionController@getDistrictList');
Route::get('get-upazila-list','DivisionController@getUpazilaList');
Route::get('get-post-list','DivisionController@getPostList');

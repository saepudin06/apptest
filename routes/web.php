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
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('manage_project', 'ManageProjectController');
Route::get('/import_excel/{id}', 'ImportExcelController@index');
Route::post('/import_excel/import/{id}', 'ImportExcelController@import');

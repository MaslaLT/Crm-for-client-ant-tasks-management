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

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::resources([
        '/tasks' => 'TasksController',
        '/projects' => 'ProjectsController',
        '/adminPanel' => 'AdminPanelController',
    ]);

    Route::post('comments/store','CommentsController@store')->name('comments.store');
});
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
Auth::routes();

Route::redirect('/', '/login');

Route::resource('admins', 'AdminsController');
Route::resource('users', 'UsersController');
Route::resource('companies', 'CompaniesController');
Route::resource('trainings', 'TrainingsController');
Route::get('trainings/{id}/courses',['uses'=>'TrainingsController@courses', 'as'=>'trainings.courses']);
Route::resource('courses', 'CoursesController');
Route::get('courses/{course}/qcms', ['uses'=>'CoursesController@qcms', 'as'=>'courses.qcms']);
Route::resource('categories', 'CategoriesController');
Route::resource('qcms', 'QcmsController');


Route::post('companies/subscribe', ['uses'=>"CompaniesController@subscribe", "as"=>"companies.subscribe"]);
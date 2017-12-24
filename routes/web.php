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
Route::get('trainings/{training}/attach-users',['uses'=>'TrainingsController@attachUsers', 'as'=>'trainings.attachusers']);
Route::post('trainings/store-user',['uses'=>'TrainingsController@storeUserTraining', 'as'=>'trainings.storeusertraining']);
Route::post('training/subscribe', ['uses'=>"TrainingsController@subscribe", "as"=>"companies.subscribe"]);

Route::resource('courses', 'CoursesController');
Route::get('courses/{course}/qcms', ['uses'=>'CoursesController@qcms', 'as'=>'courses.qcms']);
Route::resource('categories', 'CategoriesController');
Route::resource('qcms', 'QcmsController');
Route::get("confirm/training/{training}/company/{company}/notification/{notification}","TrainingsController@confirmSub");


//ATTACH training to users / companies
Route::post('training/attach/companies', ['uses' =>"TrainingsController@attachToCompany", 'as' =>"trainings.attach"]);

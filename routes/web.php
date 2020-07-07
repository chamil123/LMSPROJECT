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

Route::get('/home','HomeController@index');
Route::resource('courses','CourseController');
Route::resource('coursemodes','CourseModeController');
Route::resource('papercategories','PaperCategoryController');
Route::resource('quizes','QuizController');
Route::get('admin/home/quizes','QuizController@index');
Route::get('admin/home/coursemodes','CourseModeController@index');

Route::get('searchbox','searchController@search')->name('searchfilter');
//Route::get('search','searchController@search');

Route::resource('mcqoptions','mcqoptionsController');

Route::resource('coursetests','CoursetestController');
Route::get('admin/home/coursetests','CoursetestController@index');

Route::resource('managemcq','managemcqController');
Route::get('admin/home/managemcq','managemcqController@index');

Route::resource('exams','examController');
Route::get('admin/home/exams','examController@index');

Route::resource('mcqquizes','mcqquizeController');
Route::get('admin/home/mcqquizes','mcqquizeController@index');


Route::post('admin/home/managemcq', 'managemcqController@destroy');
Route::get('admin/home/editmcqmodel', 'managemcqController@update')->name('editmcqmodel');




Route::get('admin/home','AdminController@index');
Route::get('admin/home/courses','CourseController@index');
Route::get('admin/home/paper-categories','PaperCategoryController@index');
//Route::get('admin/home/coursemodes','AdminController@coursemodes');

Route::get('admin/home/add-quizes','AdminController@addQuizes');


Route::get('instructor/home','InstructorController@index');


Route::GET('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');

Route::POST('admin','Admin\LoginController@login');

Route::GET('login','Admin\LoginController@showLoginForm');

Route::POST('login','Admin\LoginController@login');

Route::POST('admin-password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

Route::GET('admin-password/reset','Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');


Route::POST('admin-password/reset','Admin\ResetPasswordController@reset');

Route::POST('admin-password/reset/{token}','Admin\ForgotPasswordController@showResetForm')->name('admin.password.reset');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

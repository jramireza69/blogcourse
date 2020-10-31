<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::get('/', 'WelcomeController@index')->name('welcome');

Auth::routes();

Route::group(['prefix' => 'courses', 'as' => 'courses.'], function () {
    Route::get('/', 'CourseController@index')->name('index');
    Route::post('/search', 'CourseController@search')->name('search');
    Route::get('/{course}', 'CourseController@show')->name('show');
    Route::get('/{course}/learn', 'CourseController@learn')
        ->name('learn')->middleware("can_access_to_course");

    Route::get('/{course}/review', 'CourseController@createReview')
        ->name('reviews.create');
    Route::post('/{course}/review', 'CourseController@storeReview')
        ->name('reviews.store');
});




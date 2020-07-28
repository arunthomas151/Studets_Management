<?php

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

Route::get('/','LoginController@login')->name('login');
Route::get('register','LoginController@register')->name('register');

Route::post('authentication','LoginController@authentication')->name('authentication');
Route::post('registration','LoginController@registration')->name('registration');

Route::get('student','StudentController@student')->name('student');
Route::get('home','StudentController@home')->name('home');
Route::post('add_student','StudentController@add_student')->name('add_student');
Route::get('edit_student/{id}','StudentController@edit_student')->name('edit_student');
Route::post('update_student','StudentController@update_student')->name('update_student');
Route::post('delete_student','StudentController@delete_student')->name('delete_student');

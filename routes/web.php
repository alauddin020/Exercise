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

//Route::get('/', function () {
//    return view('form.choose');
//});
//Route::resource('forms','FormController');
//
//Route::get('custom','FormController@custom')->name('custom');
//
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::post('/profile', 'HomeController@profileActive');
Route::put('/profile', 'HomeController@password');

Route::get('/', function () {
    return redirect()->route('login');
});
Route::post('quiz/download','QuizController@download')->name('download');
Route::resource('quiz','QuizController');

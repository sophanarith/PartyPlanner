<?php

use Illuminate\Http\RedirectResponse;
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



//$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
//$this->post('login', 'Auth\LoginController@login');
//$this->post('logout', 'Auth\LoginController@logout')->name('logout');
//
//// Registration Routes...
//$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//$this->post('register', 'Auth\RegisterController@register');
//// Password Reset Routes...
//$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//$this->post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'],function(){

    Route::get('/createActivity', 'ActivityController@getCreate');
    Route::post('/postCreateActivity', 'ActivityController@postCreate');

    Route::get('/displayActivities', 'ActivityController@getDisplay');

    Route::post('/activity/delete', 'ActivityController@postDelete');
    Route::get('/activity/edit/{id}', 'ActivityController@getEdit');
    Route::post('/activity/update', 'ActivityController@postUpdate');

    Route::post('/activity/finish', 'ActivityController@postFinish');

    Route::group(['middleware'=>'role'], function (){

        Route::get('/admin', 'AdminController@index');
        Route::post('/admin/user/edit', 'AdminController@update');
        Route::post('/admin/user/delete', 'AdminController@delete');

    });

});



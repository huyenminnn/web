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

Route::group(['prefix' => 'admin'], function() {
    // Authentication Routes...
	Route::get('login', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');
	Route::post('login', 'AdminAuth\LoginController@login')->name('admin.login.process');
	Route::post('logout', 'AdminAuth\LoginController@logout')->name('admin.logout');

    // Registration Routes...
	Route::get('register', 'AdminAuth\RegisterController@showRegistrationForm')->name('admin.register');
	Route::post('register', 'AdminAuth\RegisterController@register')->name('admin.signin');

    // Password Reset Routes...
	Route::get('password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm')->name('admin.password.reset');
	Route::post('password/reset', 'AdminAuth\ResetPasswordController@reset');

	//Redirect to home
	Route::get('/','AdminController@getIndex')->name('admin.home');

	Route::get('/home','AdminController@getIndex');

	/**
	 * CATEGORY
	 */
	Route::group(['prefix' => 'category'], function() {
	    
	    Route::get('/', 'Admin\CategoryController@getIndex')->name('admin.category.list');

	    Route::get('/listCategory', 'Admin\CategoryController@anyData')->name('admin.category.dataTable');

	    Route::post('/', 'Admin\CategoryController@store')->name('admin.category.store');

	    Route::delete('/delete/{id}', 'Admin\CategoryController@destroy');

	    Route::get('/{id}', 'Admin\CategoryController@show');

	    Route::get('/edit/{id}', 'Admin\CategoryController@edit')->name('admin.category.edit');

	    Route::put('/update/{id}', 'Admin\CategoryController@update')->name('admin.category.update');
	});

	Route::group(['prefix' => 'product'], function() {
	    
	    Route::get('/', 'Admin\ProductController@getIndex')->name('admin.product.list');

	    Route::get('/listProduct', 'Admin\ProductController@anyData')->name('admin.product.dataTable');

	    Route::post('/store', 'Admin\ProductController@store')->name('admin.product.store');

	    Route::get('/{id}','Admin\ProductController@show');

	    Route::get('/edit/{id}','Admin\ProductController@edit');

	    Route::put('/update/{id}', 'Admin\ProductController@update');

	    Route::delete('/delete/{id}', 'Admin\ProductController@destroy');

	});

	Route::group(['prefix' => 'admin'], function() {

		Route::get('/','Admin\AdminsController@getIndex')->name('admin.admins.list');

		Route::get('/listAdmins', 'Admin\AdminsController@anyData')->name('admin.admins.dataTable');

		Route::post('/store', 'Admin\AdminsController@store')->name('admin.admins.store');

		Route::get('/{id}','Admin\AdminsController@show');

		Route::delete('/delete/{id}', 'Admin\AdminsController@destroy');

	});
});


Route::get('/', 'Restaurant\HomeController@getIndex')->name('restaurant.home');

Route::get('/about-us', 'Restaurant\HomeController@getAboutUs')->name('restaurant.aboutUs');

Route::get('/contact-us', 'Restaurant\HomeController@getFormBooking')->name('restaurant.booking');

<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

use App\RoleUser;

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

// Using Closure based composers...
View::composer(['*'], function ($view) {
	if (isset(Auth::user()->id)) {
		$role = RoleUser::getRole();
		$view->with('role', $role);
	}
});

Route::get('/', function () {
    return view('welcome');
    // echo DNS2D::getBarcodeHTML('http://barcode.kataback.com/1BKAFzkIaePhh2tQ', 'QRCODE');
});

Route::get('home', 'HomeController@index')->name('home');
Route::get('{id}', 'HomeController@checkCode')->name('checkCode');
Route::get('{id}/error', 'HomeController@codeError')->name('codeError');

Route::group(['prefix' => 'admin'], function () {
	Route::get('home', 'Admin\HomeController@index')->name('admin.home');
});

Route::group(['prefix' => 'executive'], function () {
	Route::get('home', 'Executive\HomeController@index')->name('executive.home');
});

Route::group(['prefix' => 'supervisor'], function () {
	Route::get('home', 'Supervisor\HomeController@index')->name('supervisor.home');
});

Route::group(['prefix' => 'marketing'], function () {
	Route::get('home', 'Marketing\HomeController@index')->name('marketing.home');
});

Route::group(['prefix' => 'production'], function () {
	Route::get('home', 'Production\HomeController@index')->name('production.home');
});

Route::group(['prefix' => 'shipping'], function () {
	Route::get('home', 'Shipping\HomeController@index')->name('shipping.home');
});

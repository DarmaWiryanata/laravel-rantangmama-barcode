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
    return redirect('/login');
    // echo DNS2D::getBarcodeHTML('http://barcode.kataback.com/1BKAFzkIaePhh2tQ', 'QRCODE');
});

Route::get('home', 'HomeController@index')->name('home');
Route::get('cek/{id}', 'HomeController@checkCode')->name('checkCode');
Route::get('cek/{id}/error', 'HomeController@codeError')->name('codeError');

Route::group(['prefix' => 'admin'], function () {
	Route::get('home', 'Admin\HomeController@index')->name('admin.home');
	Route::resource('produk', 'Admin\ProdukController', [
		'only' => ['index', 'show', 'store', 'update', 'destroy']
	])->names([
		'index'		=> 'admin.produk.index',
		'show'		=> 'admin.produk.show',
		'store'		=> 'admin.produk.store',
		'update'	=> 'admin.produk.update',
		'destroy'	=> 'admin.produk.destroy'
	]);
	Route::resource('produksi', 'Admin\ProduksiController', [
		'only' => ['index', 'show', 'store', 'update', 'destroy']
	])->names([
		'index'		=> 'admin.produksi.index',
		'show'		=> 'admin.produksi.show',
		'store'		=> 'admin.produksi.store',
		'update'	=> 'admin.produksi.update',
		'destroy'	=> 'admin.produksi.destroy'
	]);
	Route::resource('reseller', 'Admin\ResellerController', [
		'only' => ['index', 'show', 'store', 'update', 'destroy']
	])->names([
		'index'		=> 'admin.reseller.index',
		'show'		=> 'admin.reseller.show',
		'store'		=> 'admin.reseller.store',
		'update'	=> 'admin.reseller.update',
		'destroy'	=> 'admin.reseller.destroy'
	]);
	Route::resource('member', 'Admin\UserController', [
		'only' => ['index', 'show', 'store', 'update', 'destroy']
	])->names([
		'index'		=> 'admin.user.index',
		'show'		=> 'admin.user.show',
		'store'		=> 'admin.user.store',
		'update'	=> 'admin.user.update',
		'destroy'	=> 'admin.user.destroy'
	]);
});

Route::group(['prefix' => 'executive'], function () {
	Route::get('home', 'Executive\HomeController@index')->name('executive.home');
	Route::get('produk', 'Executive\HomeController@produk')->name('executive.produk');
	Route::get('produksi', 'Executive\HomeController@produksi')->name('executive.produksi');
	Route::get('user', 'Executive\HomeController@user')->name('executive.user');
});

Route::group(['prefix' => 'supervisor'], function () {
	Route::get('produk', 'Supervisor\HomeController@index')->name('supervisor.home');
});

Route::group(['prefix' => 'marketing'], function () {
	Route::get('home', 'Marketing\HomeController@index')->name('marketing.home');
	Route::get('produk', 'Marketing\HomeController@produk')->name('marketing.produk');
});

Route::group(['prefix' => 'production'], function () {
	Route::get('/', 'Production\HomeController@index')->name('production.produksi');
	Route::get('validasi', 'Production\HomeController@validasi')->name('production.validasi');
});

Route::group(['prefix' => 'shipping'], function () {
	Route::resource('/pengiriman', 'Shipping\ShippingController');
	Route::get('home', 'Shipping\HomeController@index')->name('shipping.home');
});

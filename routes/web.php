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

Auth::routes(['register' => false]);

// Using Closure based composers...
View::composer(['*'], function ($view) {
	if (isset(Auth::user()->id)) {
		$role = RoleUser::firstRole(Auth::user()->id);
		$view->with('role', $role);
	}
});

Route::get('/', function () {
	return redirect('/login');
	// echo DNS1D::getBarcodeHTML('GusMangGanteng', 'CODE11');
	// echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG(Str::random(10), 'C128',1,50,array(1,1,1), true) . '" alt="barcode"   />';
    // echo DNS2D::getBarcodeHTML('1BKAFzkIaePhh2tQ', 'QRCODE');
});

Route::get('password', 'HomeController@editPassword')->name('password.edit');
Route::post('password', 'HomeController@updatePassword')->name('password.update');

Route::get('home', 'HomeController@index')->name('home');
Route::get('cek/{id}', 'HomeController@checkCode')->name('checkCode');
Route::get('cek/{id}/error', 'HomeController@codeError')->name('codeError');

Route::group(['prefix' => 'admin'], function () {
	Route::get('home', 'Admin\HomeController@index')->name('admin.home');
	Route::get('reset-password/{id}', 'Admin\UserController@resetPassword')->name('admin.resetPassword');
	Route::get('print-barcode/{id}', 'Admin\ProduksiController@printBarcode')->name('admin.print-barcode');
	Route::get('produk-rusak', 'Admin\ProduksiController@scanProdukRusak')->name('admin.produk-rusak');
	Route::post('produk-rusak', 'Admin\ProduksiController@rusakUpdate')->name('admin.produk-rusak.update');
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

	Route::group(['prefix' => 'member'], function () {
		Route::resource('/', 'Admin\MemberController', [
			'only' => ['index', 'show', 'store', 'update', 'destroy']
		])->names([
			'index'		=> 'admin.member.index',
			'show'		=> 'admin.member.show',
			'store'		=> 'admin.member.store',
			'update'	=> 'admin.member.update',
			'destroy'	=> 'admin.member.destroy'
		]);
	});

	Route::resource('user', 'Admin\UserController', [
		'only' => ['index', 'show', 'store', 'update', 'destroy']
	])->names([
		'index'		=> 'admin.user.index',
		'show'		=> 'admin.user.show',
		'store'		=> 'admin.user.store',
		'update'	=> 'admin.user.update',
		'destroy'	=> 'admin.user.destroy'
	]);

	Route::resource('penyimpanan', 'Admin\PenyimpananController', [
		'only' => ['index', 'show', 'store', 'update', 'destroy']
	])->names([
		'index'		=> 'admin.penyimpanan.index',
		'show'		=> 'admin.penyimpanan.show',
		'store'		=> 'admin.penyimpanan.store',
		'update'	=> 'admin.penyimpanan.update',
		'destroy'	=> 'admin.penyimpanan.destroy'
	]);
});

Route::group(['prefix' => 'executive'], function () {
	Route::get('home', 'Executive\HomeController@index')->name('executive.home');
	Route::post('laporan', 'Executive\HomeController@show')->name('executive.show');
	Route::get('laporandata', 'Executive\HomeController@showdata')->name('executive.showdata');
	Route::get('produk', 'Executive\HomeController@produk')->name('executive.produk');
	Route::get('produksi', 'Executive\HomeController@produksi')->name('executive.produksi');
	Route::get('user', 'Executive\HomeController@user')->name('executive.user');
});

Route::group(['prefix' => 'supervisor'], function () {
	Route::resource('produk', 'Supervisor\HomeController', [
		'only' => ['index', 'show', 'update']
	])->names([
		'index'		=> 'supervisor.home',
		'show'		=> 'supervisor.show',
		'update'	=> 'supervisor.update',
	]);
	// Route::get('produk', 'Supervisor\HomeController@index')->name('supervisor.home');
	// Route::get('produk/{id}', 'Supervisor\HomeController@show')->name('supervisor.show');
});

Route::group(['prefix' => 'marketing'], function () {
	Route::get('home', 'Marketing\HomeController@index')->name('marketing.home');
	Route::get('produk', 'Marketing\HomeController@produk')->name('marketing.produk');
});

Route::group(['prefix' => 'production'], function () {
	Route::get('/', 'Production\HomeController@index')->name('production.produksi');
	Route::get('validasi', 'Production\HomeController@validasi')->name('production.validasi');
	Route::post('production', 'Production\HomeController@production')->name('production.update');
	Route::get('barcode', 'Production\HomeController@singleBarcode')->name('production.barcode');
	Route::post('barcode', 'Production\HomeController@printBarcode')->name('production.barcode.print');
});

Route::group(['prefix' => 'shipping'], function () {
	// Route::resource('/pengiriman', 'Shipping\ShippingController');
	Route::get('/', 'Shipping\HomeController@index')->name('shipping.index');
	Route::post('shipping', 'Shipping\HomeController@shipping')->name('shipping.update');
	Route::get('/data/{id}', 'Shipping\HomeController@show')->name('shipping.show');
	Route::get('/retur', 'Shipping\HomeController@retur')->name('shipping.retur');
	Route::post('retur', 'Shipping\HomeController@returUpdate')->name('shipping.returUpdate');
});

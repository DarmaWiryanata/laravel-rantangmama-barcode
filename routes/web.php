<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

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
    // return view('welcome');
    echo DNS2D::getBarcodeHTML('http://website.com/'.Str::random(), 'QRCODE');
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::get('{id}', 'HomeController@checkCode')->name('checkCode');
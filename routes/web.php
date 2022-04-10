<?php

use App\Models\Party;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

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
Route::get('foo',function () {
//$test="#1234";
//str
//dd(str_replace($test,'#',1));
});
Auth::routes();

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');

Route::get("get-cities",
    "App\Http\Controllers\ReservationController@get_cities")->name("get-cities");
Route::post('/get-product','App\Http\Controllers\ProductController@getProduct')->name('get-product');
Route::post('/get-accessory','App\Http\Controllers\AccessoryController@getAccessory')->name('get-accessory');
Route::post('/get-party','App\Http\Controllers\PartyController@getParty')->name('get-party');
Route::resource('/product','App\Http\Controllers\ProductController');
Route::resource('/party','App\Http\Controllers\PartyController');
Route::resource('/accessory','App\Http\Controllers\AccessoryController');

Route::get('/reservation/pay/{reservation}','App\Http\Controllers\ReservationController@pay')->name('reservation.pay');
Route::get('/reservation/pay1','App\Http\Controllers\ReservationController@pay1')->name('reservation.pay1');

Route::get('/reservation/invoice/{reservation}','App\Http\Controllers\ReservationController@invoice')->name('reservation.invoice');
Route::post('/update_price','App\Http\Controllers\ReservationController@updateTotalPrice')->name('update_total_price');
Route::post('/supplier/create/create-multi','App\Http\Controllers\SupplierController@createMulti')->name('supplier.create-multi');

Route::resource('reservation','App\Http\Controllers\ReservationController');
Route::resource('supplier','App\Http\Controllers\SupplierController');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

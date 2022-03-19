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
Route::get('/reservation/invoice/{id}','App\Http\Controllers\ReservationController@invoice')->name('reservation.invoice');

Route::resource('reservation','App\Http\Controllers\ReservationController');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

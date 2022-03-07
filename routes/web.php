<?php

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Auth;
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
Route::get('foo',function (){
//    $prefix = "#";
//    $id = IdGenerator::generate(['table' => 'products', 'length' => 9, 'prefix' =>$prefix]);
    $orderObj = \DB::table('products')->latest('id')->first();

    dd($orderObj);
});
Auth::routes();

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');

Route::resource('/product','App\Http\Controllers\ProductController');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

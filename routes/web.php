<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


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


Route::group(['prefix' => 'web'],function (){

    Route::get('/', [ProductController::class, 'index']);
    Route::post('/', [ProductController::class, 'select'])->name('select');

    Route::get('/getlist', [ProductController::class, 'getlist'])->name('getlist');

});

/*Route::get('/web', function () {
    return view('product');
});*/

Route::get('testget',function(){
    $p_name_st[0] = ['ACER筆電','宏碁'];
    $p_name_st[1] = ['ASUS筆電','華碩'];
    $p_name_st[2] = ['MSI筆電','微星'];

//    dd($p_name_st);

//    array_rand();
    $i = random_int(0,2);
    dd($i);

    return "123";


});

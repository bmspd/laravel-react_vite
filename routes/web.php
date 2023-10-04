<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Auth\RegisterController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/api/swagger', function () {
//    return view('vendor.l5-swagger.index');
//});

Route::get('{any}', function () {
    return view('vite-app');
})->where('any', '.*');

Route::get('/', function() {
    return view('vite-app');
});

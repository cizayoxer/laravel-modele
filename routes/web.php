<?php

use App\Http\Controllers\OrdersController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/orders', [OrdersController::class, 'list']);

Route::get('/orders/create', [OrdersController::class, 'createForm']);
Route::post('/orders/create', [OrdersController::class, 'create']);

Route::get('/orders/{id}', [OrdersController::class, 'detail']);



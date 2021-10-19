<?php

use App\Http\Controllers\Ticket;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::post('ticket/end', [TicketController::class,'end'])->name('tickets.end');
Route::resource('tickets', TicketController::class);
Route::get('service-cookie', [TicketController::class, 'serviceCookie']);
Route::resource('users', UserController::class);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\TicketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['api'])->group(static function () {
    Route::post('/login', [UsersController::class, 'Login']);
    Route::post('/register', [UsersController::class, 'Register']);
    Route::post('/addticket', [TicketController::class, 'AddTicket']);
    Route::get('/listicket', [TicketController::class, 'ListTicket']);
    Route::post('/removeticket', [TicketController::class, 'RemoveTicket']);
    Route::post('/updateticket', [TicketController::class, 'UpdateTicket']);
});
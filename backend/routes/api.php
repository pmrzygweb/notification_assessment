<?php

use App\Http\Controllers\LogController;
use App\Http\Controllers\MessageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/message_types', [MessageController::class, 'getAllMessageTypes']);
Route::post('/send_message', [MessageController::class, 'sendMessage']);
Route::get('/logs', [LogController::class, 'getAllLogs']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

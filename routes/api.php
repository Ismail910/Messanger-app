<?php

use App\Http\Controllers\ConversationsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessagesController;
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

Route::post('login', [LoginController::class,'login'])->name('login');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::middleware(['auth.api'])->group(function () {
    Route::get('conversations',[ConversationsController::class , 'index']);
    Route::get('conversation/{conversation}',[ConversationsController::class , 'show']);
    Route::post('conversation/{conversation}/participant',[ConversationsController::class , 'addParticipant']);
    Route::delete('conversation/{conversation}/participant',[ConversationsController::class , 'removeParticipant']);
   
    Route::get('conversation/{id}/messages',[MessagesController::class,'index']);
    Route::post('/messages',[MessagesController::class , 'store']);
    Route::delete('/messages/{id}',[MessagesController::class , 'destroy']);
});

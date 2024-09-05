<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\BlockController;


Route::get('/', function () {
    return view('welcome');
});

Route::post('getFriends', [HomeController::class, 'getFriends']);
Route::post('/session/create', [SessionController::class, 'create']);
Route::post('/session/{session}/chats', [ChatController::class, 'chats']);
Route::post('/session/{session}/read', [ChatController::class, 'read']);
Route::post('/session/{session}/clear', [ChatController::class, 'clear']);
Route::post('/session/{session}/block', [BlockController::class, 'block']);
Route::post('/session/{session}/unblock', [BlockController::class, 'unblock']);
Route::post('/send/{session}', [ChatController::class, 'send']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

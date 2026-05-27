<?php
use Illuminate\Support\Facades\Route;



use App\Http\Controllers\ChatController;


Route::post('/chat/ask', [ChatController::class, 'ask']);




?>
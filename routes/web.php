<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlShortenerController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{short_code}', [UrlShortenerController::class, 'redirect']);

<?php

use App\Http\Route\Route;
use App\Http\Controllers\TestController;

Route::get('/test/test', [TestController::class, 'test']);

$routes = Route::routes();
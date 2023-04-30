<?php

use App\Database\RunMigration;
use App\Http\Route\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\SellerController;

Route::get('/test/test', [TestController::class, 'test']);
Route::get('/run/migration', [RunMigration::class, 'runMigration']);
Route::get('/api/get_order_list', [RunMigration::class, 'runMigration']);

// customers
Route::post('/api/customer/calculate/delivery', [CustomerController::class, 'calculateDelivery']);
Route::post('/api/customer/create/order',       [CustomerController::class, 'createOrder']);

// seller
Route::post('/api/seller/get/orders/list',      [SellerController::class,   'getOrdersList']);
Route::post('/api/seller/get/order/info/by/id',       [SellerController::class,   'getOrderInfoById']);
Route::post('/api/seller/get/order/info/by/status',   [SellerController::class,   'getOrdersListByStatusId']);

// delivery
Route::post('/api/delivery/get/order/info',     [DeliveryController::class,   'getOrderInfo']);
Route::post('/api/delivery/get/order/info/by/id',     [DeliveryController::class,   'getOrderById']);


$routes = Route::routes();
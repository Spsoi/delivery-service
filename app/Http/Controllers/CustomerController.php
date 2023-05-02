<?php

namespace App\Http\Controllers;

// use App\Database\DB as DBConnection;

use App\Models\Order;
use App\Services\Products\ProductService;
use App\Services\Addresses\AddressService;
use App\Services\Orders\OrderService;
use App\Services\Warehouse\WarehouseService;
use Exception;

class CustomerController extends BaseController
{

    public function __construct()
    {
        $user = $this->getArrayStream();
        $customer = array_values($user['customer']);
        \App\Middleware\RateLimitMiddleware::ratelimit(reset($customer)['id']);
    }

    protected function getDeliveryCost()
    {
        $delivery = $this->getArrayStream();
        $deliveryAddressIds = array_values($delivery['addresses']);
        $warehouseId = reset($deliveryAddressIds);
        $warehouseIns = new WarehouseService;
        $warehouseModel = $warehouseIns->getWarehouseByAddressId($warehouseId);
        $warehouse = $warehouseModel->get()->first();
        if (empty($warehouse)) {
            throw new Exception('Склад не найден', http_response_code(422));
        }
        $addressServiceIns = new AddressService;
        $costDelivery  = $addressServiceIns->costDelivery($deliveryAddressIds);
        return ['cost' => $costDelivery, 'seller_id' => $warehouse->seller_id];
    }

    public function calculateDelivery()
    {
        $costDelivery = $this->getDeliveryCost();
        response($costDelivery['cost']);
    }

    public function createOrder()
    {
        $costDelivery = $this->getDeliveryCost();
        $delivery = $this->getArrayStream();
        $cost = $costDelivery['cost'];
        $sellerId = $costDelivery['seller_id'];
        $order = OrderService::createOrder($delivery, $cost, $sellerId);
        response($order->toArray());
    }
}
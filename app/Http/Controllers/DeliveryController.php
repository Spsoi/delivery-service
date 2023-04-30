<?php

namespace App\Http\Controllers;

use App\Services\Users\UserService;
use App\Services\Orders\OrderService;
use Exception;

class DeliveryController extends BaseController
{

    public function __construct()
    {
        $this->checkSellerExist();
    }

    public function checkSellerExist()
    {
        $filterOptions = $this->getArrayStream();

        if (!isset($filterOptions['delivery_id'])) {
            return throw new Exception('ID продавца не передано', 422);
        }

        $deliveryId = $filterOptions['delivery_id'];
        $check = UserService::checkDeliveryById($deliveryId);

        if (empty($check)) {
            return throw new Exception('ID курьера в базе отсутствует', 422);
        }
    }

    public function getOrderInfo()
    {
        $filterOptions = $this->getArrayStream();
        $deliveryId = $filterOptions['delivery_id'];  

        $orders = OrderService::getOrdersInfoForDelivery($deliveryId );
        response($orders->get()->toArray());

    }

    public function getOrderById()
    {
        $filterOptions = $this->getArrayStream();
        $deliveryid = $filterOptions['delivery_id'];

        if (!isset($filterOptions['order_id'])) {
            throw new Exception('Нет ID заказа!', 422);
        }
        $orderId = $filterOptions['order_id'];  
     
        $order = OrderService::getOrderByIdForDelivery($deliveryid, $orderId);
        if (empty($order)) {
            throw new Exception('Заказ не найден!', 422);
        }
        response($order->get()->toArray());
    }
}
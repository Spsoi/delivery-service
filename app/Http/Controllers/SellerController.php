<?php

namespace App\Http\Controllers;

use App\Services\Orders\OrderService;
use App\Services\Users\UserService;
use Exception;

class SellerController extends BaseController
{

    public function __construct()
    {
        $this->checkSellerExist();
    }

    public function checkSellerExist()
    {
        $filterOptions = $this->getArrayStream();

        if (!isset($filterOptions['seller_id'])) {
            return throw new Exception('ID продавца отсутствует', 422);
        }

        $sellerId = $filterOptions['seller_id'];
        $check = UserService::checkSellerById($sellerId);

        if (empty($check)) {
            return throw new Exception('ID продавца отсутствует', 422);
        }
    }

    public function getOrdersList()
    {
        $filterOptions = $this->getArrayStream();

        $sellerId = $filterOptions['seller_id'];
        $order = OrderService::getOrdersListBySellerId($sellerId);
        response($order->get());
    }

    public function getOrdersListByStatusId()
    {
        $filterOptions = $this->getArrayStream();

        $sellerId = $filterOptions['seller_id'];

        if (!isset($filterOptions['status_id'])) {
            return throw new Exception('Нет статуса заказа!', 422);
        }

        $statusId = $filterOptions['status_id'];  
        $orders = OrderService::getOrdersListByStatusIdForSeller($sellerId, $statusId);
        response($orders->get()->toArray());
    }

    public function getOrderInfoById()
    {
        $filterOptions = $this->getArrayStream();

        if (!isset($filterOptions['order_id'])) {
            return throw new Exception('Нет номера заказа!', 422);
        }

        $orderId = $filterOptions['order_id'];  
        $order = OrderService::getOrderInfoById($orderId);

        if (empty($order)) {
            return throw new Exception('Заказа нет!', 422); // TODO оформить экзепшены
        }
        response($order->toArray());
    }
}
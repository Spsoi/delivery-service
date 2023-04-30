<?php

use App\Database\Migration;
use App\Models\Order;

class AddOrdersToTableOrder extends Migration
{
    public function up()
    {
        $currentDate = new DateTime();
        $randomDays = rand(1, 5);
        $currentDate->modify("+ $randomDays day");
        // TODO добавить цену доставки и цену продуктов delivery_deadline
        $orders = [
            [
                'user_id' => 1,
                'seller_address_id' => 1,
                'delivery_address_id' => 18,
                'name' => 'Orders 1',
                'delivery_deadline' => $currentDate->modify("- ". 10 ." day")->format('Y-m-d H:i:s'),
                'delivery_completed_at' => $currentDate->modify("- ". 1 ." day")->format('Y-m-d H:i:s'),
                'status_id'   => 1,
                'description' => 'Description of Orders 1',
                'delivery_price' => 10.50,
                'products_price' => 10.50,
                'total_price' => 10.50 + 10.50,
            ],
            [
                'user_id' => 2,
                'seller_address_id' => 2,
                'delivery_address_id' => 10,
                'name' => 'Orders 2',
                'delivery_deadline' => $currentDate->modify("- ". 1 ." day")->format('Y-m-d H:i:s'),
                'delivery_completed_at' => $currentDate->modify("- ". 10 ." day")->format('Y-m-d H:i:s'),
                'status_id'   => 1,
                'description' => 'Description of Orders 2',
                'delivery_price' => 15.75,
                'products_price' => 15.75,
                'total_price' => 15.75 + 15.75,
            ],
            [
                'user_id' => 3,
                'seller_address_id' => 2,
                'delivery_address_id' => 13,
                'name' => 'Orders 3',
                'delivery_deadline' => $currentDate->modify("- ". 5 ." day")->format('Y-m-d H:i:s'),
                'delivery_completed_at' => $currentDate->modify("- ". 13 ." day")->format('Y-m-d H:i:s'),
                'status_id'   => 1,
                'description' => 'Description of Orders 3',
                'delivery_price' => 20.00,
                'products_price' => 20.00,
                'total_price' => 20.00 + 20.00,
            ],
            [
                'user_id' => 1,
                'seller_address_id' => 1,
                'delivery_address_id' => 17,
                'name' => 'Orders 4',
                'delivery_deadline' => $currentDate->modify("- ". 10 ." day")->format('Y-m-d H:i:s'),
                'delivery_completed_at' => null,
                'status_id'   => 1,
                'description' => 'Description of Orders 4',
                'delivery_price' => 5.00,
                'products_price' => 5.00,
                'total_price' => 5.00 + 5.00,
            ],
            [
                'user_id' => 2,
                'seller_address_id' => 1,
                'delivery_address_id' => 12,
                'name' => 'Orders 5',
                'delivery_completed_at' => $currentDate->modify("- ". 10 ." day")->format('Y-m-d H:i:s'),
                'delivery_deadline' => null,
                'status_id'   => 2,
                'description' => 'Description of Orders 5',
                'delivery_price' => 30.00,
                'products_price' => 30.00,
                'total_price' => 30.00 + 30.00,
            ],
            [
                'user_id' => 3,
                'seller_address_id' => 1,
                'delivery_address_id' => 11,
                'name' => 'Orders 6',
                'delivery_deadline' => $currentDate->modify("- ". 10 ." day")->format('Y-m-d H:i:s'),
                'delivery_completed_at' => $currentDate->modify("- ". 10 ." day")->format('Y-m-d H:i:s'),
                'status_id'   => 2,
                'description' => 'Description of Orders 6',
                'delivery_price' => 8.99,
                'products_price' => 8.99,
                'total_price' => 8.99 + 8.99,
            ],
            [
                'user_id' => 1,
                'seller_address_id' => 1,
                'delivery_address_id' => 16,
                'name' => 'Orders 7',
                'delivery_deadline' => $currentDate->modify("+ ". 10 ." day")->format('Y-m-d H:i:s'),
                'delivery_completed_at' => $currentDate->modify("- ". 10 ." day")->format('Y-m-d H:i:s'),
                'status_id'   => 3,
                'description' => 'Description of Orders 7',
                'delivery_price' => 12.50,
                'products_price' => 12.50,
                'total_price' => 12.50 + 12.50,
            ],
            [
                'user_id' => 2,
                'seller_address_id' => 1,
                'delivery_address_id' => 14,
                'name' => 'Orders 8',
                'delivery_deadline' => $currentDate->modify("- ". 10 ." day")->format('Y-m-d H:i:s'),
                'delivery_completed_at' => $currentDate->modify("- ". 10 ." day")->format('Y-m-d H:i:s'),
                'status_id'   => 2,
                'description' => 'Description of Orders 8',
                'delivery_price' => 19.99,
                'products_price' => 19.99,
                'total_price' => 19.99 + 19.99,
            ],
            [
                'user_id' => 3,
                'seller_address_id' => 1,
                'delivery_address_id' => 15,
                'name' => 'Orders 9',
                'delivery_deadline' => $currentDate->modify("- ". 5 ." day")->format('Y-m-d H:i:s'),
                'delivery_completed_at' => null,
                'status_id'   => 3,
                'description' => 'Description of Orders 9',
                'delivery_price' => 25.00,
                'products_price' => 25.00,
                'total_price' => 25.00 + 25.00,
            ],
            [
                'user_id' => 3,
                'seller_address_id' => 1,
                'delivery_address_id' => 20,
                'name' => 'Orders 10',
                'delivery_deadline' => $currentDate->modify("- ". 10 ." day")->format('Y-m-d H:i:s'),
                'delivery_completed_at' => date('Y-m-d H:i:s'),
                'status_id'   => 1,
                'description' => 'Description of Orders 10',
                'delivery_price' => 14.95,
                'products_price' => 14.95,
                'total_price' => 14.95 + 14.95,
            ],
        ];
        Order::insert($orders);
    }

    public function down() 
    {
        //TODO реализовать пока заглушка
    }
}

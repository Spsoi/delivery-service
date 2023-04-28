<?php

use App\Database\Migration;
use App\Models\Order;

class AddOrdersToTableOrder extends Migration
{
    public function up()
    {
        $orders = [
            [
                'user_id' => 1,
                'seller_address_id' => 1,
                'delivery_address_id' => 18,
                'name' => 'Orders 1',
                'description' => 'Description of Orders 1',
                'total_price' => 10.50,
            ],
            [
                'user_id' => 2,
                'seller_address_id' => 2,
                'delivery_address_id' => 10,
                'name' => 'Orders 2',
                'description' => 'Description of Orders 2',
                'total_price' => 15.75,
            ],
            [
                'user_id' => 3,
                'seller_address_id' => 2,
                'delivery_address_id' => 13,
                'name' => 'Orders 3',
                'description' => 'Description of Orders 3',
                'total_price' => 20.00,
            ],
            [
                'user_id' => 1,
                'seller_address_id' => 1,
                'delivery_address_id' => 17,
                'name' => 'Orders 4',
                'description' => 'Description of Orders 4',
                'total_price' => 5.00,
            ],
            [
                'user_id' => 2,
                'seller_address_id' => 1,
                'delivery_address_id' => 12,
                'name' => 'Orders 5',
                'description' => 'Description of Orders 5',
                'total_price' => 30.00,
            ],
            [
                'user_id' => 3,
                'seller_address_id' => 1,
                'delivery_address_id' => 11,
                'name' => 'Orders 6',
                'description' => 'Description of Orders 6',
                'total_price' => 8.99,
            ],
            [
                'user_id' => 1,
                'seller_address_id' => 1,
                'delivery_address_id' => 16,
                'name' => 'Orders 7',
                'description' => 'Description of Orders 7',
                'total_price' => 12.50,
            ],
            [
                'user_id' => 2,
                'seller_address_id' => 1,
                'delivery_address_id' => 14,
                'name' => 'Orders 8',
                'description' => 'Description of Orders 8',
                'total_price' => 19.99,
            ],
            [
                'user_id' => 3,
                'seller_address_id' => 1,
                'delivery_address_id' => 15,
                'name' => 'Orders 9',
                'description' => 'Description of Orders 9',
                'total_price' => 25.00,
            ],
            [
                'user_id' => 3,
                'seller_address_id' => 1,
                'delivery_address_id' => 20,
                'name' => 'Orders 10',
                'description' => 'Description of Orders 10',
                'total_price' => 14.95,
            ],
        ];
        Order::insert($orders);
    }

    public function down() 
    {
        //TODO реализовать пока заглушка
    }
}

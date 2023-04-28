<?php

use App\Database\Migration;
use App\Models\CustomerOrders;

class AddCustomerOrdersToCustomerOrders extends Migration
{
    public function up()
    {
        $orderProducts = [
            [
                'customer_id' => 1,
                'order_id' => 1,

            ],
        ];

        CustomerOrders::insert($orderProducts);
    }

    public function down()
    {
        //TODO реализовать пока заглушка
    }
}

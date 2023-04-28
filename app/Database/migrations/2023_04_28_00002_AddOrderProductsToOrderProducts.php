<?php

use App\Database\Migration;
use App\Models\OrderProducts;

class AddOrderProductsToOrderProducts extends Migration
{
    public function up()
    {
        $orderProducts = [
            [
                'order_id' => 1,
                'product_id' => 1,

            ],
        ];

        OrderProducts::insert($orderProducts);
    }

    public function down()
    {
        //TODO реализовать пока заглушка
    }
}

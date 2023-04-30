<?php

use App\Database\Migration;
use App\Models\Warehouse;

class AddAddressesAndUsersToTableWarehouse extends Migration
{
    public function up()
    {
        $warehouses = [
            [
                'seller_id' => 7,
                'address_id' => 1,
                'is_warehouse' => true,

            ],
            [
                'seller_id' => 8,
                'address_id' => 2,
                'is_warehouse' => true,

            ],
            [
                'seller_id' => 9,
                'address_id' => 3,
                'is_warehouse' => true,

            ],
            [
                'seller_id' => 7,
                'address_id' => 4,
                'is_warehouse' => true,

            ],
            [
                'seller_id' => 8,
                'address_id' => 5,
                'is_warehouse' => true,

            ],
            [
                'seller_id' => 9,
                'address_id' => 6,
                'is_warehouse' => true,

            ]
        ];

        Warehouse::insert($warehouses);
    }

    public function down()
    {
        //TODO реализовать пока заглушка
    }
}

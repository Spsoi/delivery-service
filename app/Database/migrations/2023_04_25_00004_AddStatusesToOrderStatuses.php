<?php

use App\Database\Migration;
use App\Models\OrderStatuses;

class AddStatusesToOrderStatuses extends Migration
{
    public function up()
    {
        $orders = [
            [
                'name' => 'Ожидание курьера',
            ],
            [
                'name' => 'Передано курьерской службе',
            ],
            [
                'name' => 'Доставлено',
            ]
        ];
        OrderStatuses::insert($orders);
    }

    public function down() 
    {
        //TODO реализовать пока заглушка
    }
}

<?php

namespace App\Services\Warehouse;

use App\Models\Warehouse;

class WarehouseService
{
    public static function getWarehouseByAddressId(int $address_id) : object
    {
        return Warehouse::where('address_id', $address_id);
    }

    public static function getWarehouseesById(array $ids) : object
    {
        return Warehouse::whereIn('id', $ids);
    }
}
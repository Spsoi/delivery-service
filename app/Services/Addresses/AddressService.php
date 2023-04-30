<?php

namespace App\Services\Addresses;

use App\Models\Address;
use Illuminate\Database\Eloquent\Collection;

class AddressService
{
    public static function getAddressById(int $id) : object
    {
        return Address::find($id);
    }

    public static function getAddressesById(array $ids) : object
    {
        return Address::whereIn('id', $ids);
    }

    public function calculateDistanceBetweenTwoAddresses(object $addresses) : float
    {
        $first = $addresses->first();
        $last = $addresses->last();

        $lat1 = $first->latitude;
        $lon1 = $first->longitude;

        $lat2 = $last->latitude;
        $lon2 = $last->longitude;

        $distance = $this->distance($lat1, $lon1, $lat2, $lon2);
        return round($distance, 2);
    }

    function distance($lat1, $lon1, $lat2, $lon2) {
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $km = $miles * 1.609344;
        return $km;
    }

    public function costDelivery(array $ids) : float
    {
        $addresses = Address::whereIn('id', $ids)->get();
         // TODO добавить экзепшен
        $distance = $this->calculateDistanceBetweenTwoAddresses($addresses);
        return round($distance * $addresses->first()->price, 2);
    }
}
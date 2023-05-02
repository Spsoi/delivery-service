<?php

namespace App\Services\Users;

use App\Models\User;
use Exception;

class UserService
{

    public static function checkUserExist(int $id) : object
    {
        $query = User::find($id);
        if (empty($query)) {
            return throw new Exception('Такого пользователя не существует', http_response_code(422));
        }
        return $query->join('users_roles', 'users.role_id', '=', 'users_roles.id')
                    ->where('users.id', $id);
    }

    public static function getDeliveryById(int $id) : object | null
    {
        $query = self::checkUserExist($id);
        return $query->where('users_roles.name', 'delivery')->first();
    }

    public static function getSellerById(int $id) : object | null
    {
        $query = self::checkUserExist($id);
        return $query->where('users_roles.name', 'seller')->first();
    }

    public static function checkDeliveryById(int $id) : bool
    {
        $query = self::getDeliveryById($id);

        if (empty($query)) {
            return false;
        }

        return true;
    }

    public static function checkSellerById(int $id) : bool
    {
        $query = self::getSellerById($id);

        if (empty($query)) {
            return false;
        }

        return true;
    }
}
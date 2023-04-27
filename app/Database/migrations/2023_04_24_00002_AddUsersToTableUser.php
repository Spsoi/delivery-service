<?php

use App\Database\Migration;
use App\Models\User;

class AddUsersToTableUser extends Migration
{
    // protected $tableName = 'users';

    public function up()
    {
        $data = [
            // Пользователи с ролью "Покупатель"
            [
                'name' => 'John Doe 1',
                'email' => 'johndoe1@example.com',
                'password' => 'password123',
                'role_id' => 1,
            ],
            [
                'name' => 'Jane Smith 1',
                'email' => 'janesmith1@example.com',
                'password' => 'password456',
                'role_id' => 1,
            ],
            [
                'name' => 'Bob Johnson 1',
                'email' => 'bobjohnson1@example.com',
                'password' => 'password789',
                'role_id' => 1,
            ],
            
            // Пользователи с ролью "Доставка"
            [
                'name' => 'John Doe 2',
                'email' => 'johndoe2@example.com',
                'password' => 'password123',
                'role_id' => 2,
            ],
            [
                'name' => 'Jane Smith 2',
                'email' => 'janesmith2@example.com',
                'password' => 'password456',
                'role_id' => 2,
            ],
            [
                'name' => 'Bob Johnson 2',
                'email' => 'bobjohnson2@example.com',
                'password' => 'password789',
                'role_id' => 2,
            ],
            
            // Пользователи с ролью "Продавец"
            [
                'name' => 'John Doe 3',
                'email' => 'johndoe3@example.com',
                'password' => 'password123',
                'role_id' => 3,
            ],
            [
                'name' => 'Jane Smith 3',
                'email' => 'janesmith3@example.com',
                'password' => 'password456',
                'role_id' => 3,
            ],
            [
                'name' => 'Bob Johnson 3',
                'email' => 'bobjohnson3@example.com',
                'password' => 'password789',
                'role_id' => 3,
            ],
        ];

        User::insert($data);
    }

    public function down() 
    {
        //TODO реализовать пока заглушка
    }
}

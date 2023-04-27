
<?php
// namespace App\Database\migrations;

use App\Database\Migration;
use App\Models\UserRoles;

class AddRolesToTableUsersRoles extends Migration
{
    // protected $tableName = 'users_roles';

    public function up()
    {
    
        $data = [
            [
                'id' => 1,
                'name' => 'customer',
                'description' => 'покупатель',
            ],
            [
                'id' => 2,
                'name' => 'delivery',
                'description' => 'доставка',
            ],
            [
                'id' => 3,
                'name' => 'seller',
                'description' => 'продавец',
            ],
        ];
        UserRoles::insert($data);
    }

    public function down() 
    {
        //TODO реализовать пока заглушка
    }
}

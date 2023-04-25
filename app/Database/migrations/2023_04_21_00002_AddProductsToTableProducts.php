
<?php
// namespace App\Database\migrations;

use App\Database\Migration;
use App\Models\Product;

class AddProductsToTableProducts extends Migration
{
    // protected $tableName = 'users_roles';

    public function up()
    {
        $products = [
            [
                "name" => "Product 1",
                "description" => "This is the first product",
                "price" => 9.99,
            ],
            [
                "name" => "Product 2",
                "description" => "This is the second product",
                "price" => 19.99,
            ],
            [
                "name" => "Product 3",
                "description" => "This is the third product",
                "price" => 29.99,
            ],
            [
                "name" => "Product 4",
                "description" => "This is the fourth product",
                "price" => 24.99,
            ],
            [
                "name" => "Product 5",
                "description" => "This is the fifth product",
                "price" => 29.99,
            ],
            [
                "name" => "Product 6",
                "description" => "This is the sixth product",
                "price" => 34.99,
            ],
            [
                "name" => "Product 7",
                "description" => "This is the seventh product",
                "price" => 39.99,
            ],
            [
                "name" => "Product 8",
                "description" => "This is the eighth product",
                "price" => 44.99,
            ],
            [
                "name" => "Product 9",
                "description" => "This is the ninth product",
                "price" => 49.99,
            ],
            [
                "name" => "Product 10",
                "description" => "This is the tenth product",
                "price" => 54.99,
            ],
            [
                "name" => "Product 11",
                "description" => "This is the eleventh product",
                "price" => 59.99,
            ],
            [
                "name" => "Product 12",
                "description" => "This is the twelfth product",
                "price" => 64.99,
            ],
            [
                "name" => "Product 13",
                "description" => "This is the thirteenth product",
                "price" => 69.99,
            ],
            [
                "name" => "Product 14",
                "description" => "This is the fourteenth product",
                "price" => 74.99,
            ],
            [
                "name" => "Product 15",
                "description" => "This is the fifteenth product",
                "price" => 79.99,
            ],
            [
                "name" => "Product 16",
                "description" => "This is the sixteenth product",
                "price" => 84.99,
            ],
            [
                "name" => "Product 17",
                "description" => "This is the seventeenth product",
                "price" => 89.99,
            ],
            [
                "name" => "Product 18",
                "description" => "This is the eighteenth product",
                "price" => 14.99,
            ],

            [
                "name" => "Product 19",
                "description" => "This is the nineteenth product",
                "price" => 24.99,
            ],
            [
                "name" => "Product 20",
                "description" => "This is the twentieth product",
                "price" => 19.99,
            ],
        ];
        Product::insert($products);
    }

    public function down()
    {
        //TODO реализовать пока заглушка
    }
}


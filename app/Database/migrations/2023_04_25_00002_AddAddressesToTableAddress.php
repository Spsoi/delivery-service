<?php

use App\Database\Migration;
use App\Models\Address;

class AddAddressesToTableAddress extends Migration
{
    public function up()
    {
        $addresses = [
            [
                "street" => "Профсоюзная ул. 123",
                "city" => "Москва",
                "postal_code" => "119333",
                "country" => "Россия",
                "price" => 50,
                "latitude" => 55.644276,
                "longitude" => 37.526627,
            ],
            [
                "street" => "Ленинский проспект 456",
                "city" => "Москва",
                "postal_code" => "117049",
                "country" => "Россия",
                "price" => 50,
                "latitude" => 55.687272,
                "longitude" => 37.559766,
            ],
            [
                "street" => "Кутузовский проспект 789",
                "city" => "Москва",
                "postal_code" => "121248",
                "country" => "Россия",
                "price" => 50,
                "latitude" => 55.739399,
                "longitude" => 37.502986,
            ],
            [
                "street" => "Пресненская набережная 2",
                "city" => "Москва",
                "postal_code" => "123100",
                "country" => "Россия",
                "price" => 50,
                "latitude" => 55.749719,
                "longitude" => 37.540616,
            ],
            [
                "street" => "улица Тверская 33",
                "city" => "Москва",
                "postal_code" => "125009",
                "country" => "Россия",
                "price" => 50,
                "latitude" => 55.764312,
                "longitude" => 37.604491,
            ],
            [
                "street" => "Красная площадь 4",
                "city" => "Москва",
                "postal_code" => "109012",
                "country" => "Россия",
                "price" => 50,
                "latitude" => 55.753593,
                "longitude" => 37.621904,
            ],

/////////////////////////////////////////////////
            
            [
                "street" => "улица Арбат 53",
                "city" => "Москва",
                "postal_code" => "119019",
                "country" => "Россия",
                "price" => 50,
                "latitude" => 55.751522,
                "longitude" => 37.590238,
            ],
            [
                "street" => "Ленинградский проспект 59",
                "city" => "Москва",
                "postal_code" => "125315",
                "country" => "Россия",
                "price" => 50,
                "latitude" => 55.794963,
                "longitude" => 37.542267,
            ],
            [
                "street" => "Варшавское шоссе 75",
                "city" => "Москва",
                "postal_code" => "117105",
                "country" => "Россия",
                "price" => 50,
                "latitude" => 55.613482,
                "longitude" => 37.645929,
            ],
            [
                "street" => "Профсоюзная улица 12",
                "city" => "Москва",
                "postal_code" => "117648",
                "country" => "Россия",
                "price" => 50,
                "latitude" => 55.671147,
                'longitude' =>37.570123,
            ],
            [
                "street" => "Преображенская площадь 8",
                "city" => "Москва",
                "postal_code" => "107061",
                "country" => "Россия",
                "price" => 50,
                "latitude" => 55.796371,
                "longitude" => 37.719186,
            ],
            [
                "street" => "улица Пятницкая 33",
                "city" => "Москва",
                "postal_code" => "115184",
                "country" => "Россия",
                "price" => 50,
                "latitude" => 55.741145,
                "longitude" => 37.623826,
            ],
            [
                "street" => "Кутузовский проспект 1",
                "city" => "Москва",
                "postal_code" => "121248",
                "country" => "Россия",
                "price" => 50,
                "latitude" => 55.74454,
                "longitude" => 37.541169,
            ],
            [
                "street" => "Каширское шоссе 109",
                "city" => "Москва",
                "postal_code" => "115404",
                "country" => "Россия",
                "price" => 50,
                "latitude" => 55.621756,
                "longitude" => 37.746969,
            ],
            [
                "street" => "Ломоносовский проспект 27",
                "city" => "Москва",
                "postal_code" => "119992",
                "country" => "Россия",
                "price" => 50,
                "latitude" => 55.702641,
                "longitude" => 37.528382,
            ],
            [
                "street" => "Новинский бульвар 31",
                "city" => "Москва",
                "postal_code" => "121069",
                "country" => "Россия",
                "price" => 50,
                "latitude" => 55.76067,
                "longitude" => 37.58426,
            ],
            [
                "street" => "проспект Мира 89",
                "city" => "Москва",
                "postal_code" => "129110",
                "country" => "Россия",
                "price" => 50,
                "latitude" => 55.789126,
                "longitude" => 37.636794,
            ],
            [
                "street" => "Сущёвский Вал 5",
                "city" => "Москва",
                "postal_code" => "127018",
                "country" => "Россия",
                "price" => 50,
                "latitude" => 55.784988,
                "longitude" => 37.607189,
            ],
            [
                "street" => "улица Новый Арбат 1",
                "city" => "Москва",
                "postal_code" => "119019",
                "country" => "Россия",
                "price" => 50,
                "latitude" => 55.75362,
                "longitude" => 37.593381,
            ],
            [
                "street" => "улица Покровка 28",
                "city" => "Москва",
                "postal_code" => "101000",
                "country" => "Россия",
                "price" => 50,
                "latitude" => 55.762843,
                "longitude" => 37.639283,
            ],
        ];
        Address::insert($addresses);
    }

    public function down()
    {
        //TODO реализовать пока заглушка
    }
}
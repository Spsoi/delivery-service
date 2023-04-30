<?php

namespace App\Services\Products;

use App\Models\Product;

class ProductService
{
    public static function getProductById(int $id) : object
    {
        return Product::find($id);
    }

    public static function getProductsById(array $ids) : object
    {
        return Product::whereIn('id', $ids);
    }
}
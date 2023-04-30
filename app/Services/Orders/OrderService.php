<?php

namespace App\Services\Orders;

use App\Models\CustomerOrders;
use Illuminate\Database\Capsule\Manager as Capsule;
use App\Models\Order;
use App\Models\OrderProducts;
use App\Models\Product;

class OrderService 
{

    public static $schema;

    public function __construct () {
        self::$schema = Capsule::schema();
    }

    public static function getOrdersList() : object
    {
        return Order::all();
    }

    public static function getOrdersListBySellerId(int $id) : object
    {
        return Order::where('seller_id', $id);
    }

    public static function getOrdersListByStatusIdForSeller(int $sellerId,int $status_id) : object
    {
        return Order::where('status_id', $status_id)->where('seller_id', $sellerId);
    }

    public static function getOrderByIdForDelivery(int $deliveryId,int $orderId) : object | null
    {

        $query = Order::select(
            'orders.id as order_id',
            'orders.customer_id as order_customer_id',
            // 'orders.delivery_id as order_delivery_id',
            'orders.delivery_deadline as order_delivery_deadline',
            'orders.delivery_completed_at as order_delivery_completed_at',
            'orders.status_id as order_status_id',
            'orders.delivery_price as order_delivery_price',
            'orders.products_price as order_products_price',
            'orders.total_price as order_total_price',
            
            'addresses_seller.street as seller_street',
            'addresses_seller.city as seller_city',
            'addresses_seller.postal_code as seller_postal_code',
            'addresses_seller.country as seller_country',

            'addresses_delivery.street as delivery_street',
            'addresses_delivery.city as delivery_city',
            'addresses_delivery.postal_code as delivery_postal_code',
            'addresses_delivery.country as delivery_country',
            'users_customer.name as customer_name',
            'users_customer.phone as customer_phone'
        )
        
        // ->join('order_products', 'orders.id', '=', 'order_products.order_id')
        // ->join('products', 'order_products.product_id', '=', 'products.id') 
        ->join('order_statuses', 'orders.status_id', '=', 'order_statuses.id')
        ->join('addresses as addresses_seller', 'orders.seller_address_id', '=', 'addresses_seller.id')
        ->join('addresses as addresses_delivery', 'orders.delivery_address_id', '=', 'addresses_delivery.id')
        ->join('users as users_customer', 'orders.customer_id', '=', 'users_customer.id')
        ->where('orders.id', $orderId)
        ->where('orders.delivery_id', $deliveryId);

        ;
        
        return $query;
    }
    
    public static function getOrderById(int $id) : object
    {
        return Order::find($id);
    }

    public static function getWarehouseesById(array $ids) : object
    {
        return Order::whereIn('id', $ids);
    }

    public static function sumProducts(array $productIds) : float
    {
        return Product::whereIn('id', $productIds)->sum('price');
    }

    public static function createOrder(array $delivery, int $costDelivery, int $seller) : object
    {
        $deliveryAddressIds = array_values($delivery['addresses']);
        $productIds = array_values($delivery['products']);
        $customerId = array_values($delivery['customer']);
        $dates = array_values($delivery['date']);
        $productsSum = self::sumProducts($productIds);
        $seller_address_id = reset($deliveryAddressIds);
        $delivery_address_id = end($deliveryAddressIds);
        $order = Order::create([
            'seller_address_id' => $seller_address_id,
            'seller_id' => $seller,
            'delivery_address_id' => $delivery_address_id,
            'delivery_deadline' => isset(reset($dates)['delivery_deadline']) ? reset($dates)['delivery_deadline'] : null,
            'name' => 'test1',
            'status_id' => 1,
            'delivery_price' => $costDelivery,
            'products_price' => $productsSum,
            'total_price' => $costDelivery + $productsSum,
            'customer_id' => reset($customerId)['id']
        ]);
        $orderProducts = [];
        foreach ($productIds as $productId) {

            $orderProducts[] = [
                'order_id' => $order->id,
                'product_id' =>$productId['id']
            ];
        }

        OrderProducts::insert($orderProducts);

        CustomerOrders::insert([
            'customer_id' => reset($customerId)['id'],
            'order_id' => $order->id
        ]);

        return $order;
    }

    public static function getOrderInfo()
    {
        $query = Order::select(
            'orders.id as order_id',
            'orders.customer_id as order_customer_id',
            'orders.delivery_id as order_delivery_id',
            'orders.delivery_deadline as order_delivery_deadline',
            'orders.delivery_completed_at as order_delivery_completed_at',
            'orders.status_id as order_status_id',
            'orders.delivery_price as order_delivery_price',
            'orders.products_price as order_products_price',
            'orders.total_price as order_total_price',
            'addresses_seller.street as seller_street',
            'addresses_seller.city as seller_city',
            'addresses_seller.postal_code as seller_postal_code',
            'addresses_seller.country as seller_country',
            'addresses_delivery.street as delivery_street',
            'addresses_delivery.city as delivery_city',
            'addresses_delivery.postal_code as delivery_postal_code',
            'addresses_delivery.country as delivery_country',
            'users_customer.name as customer_name',
            'users_customer.email as customer_email',
            'users_customer.phone as customer_phone'
        )
        ->selectRaw('
            GROUP_CONCAT(
                JSON_OBJECT(
                    "product_id", products.id,
                    "product_name", products.name,
                    "product_price", products.price,
                    "product_description", products.description
                )
            ) AS products
        ')
        ->join('order_products', 'orders.id', '=', 'order_products.order_id')
        ->join('products', 'order_products.product_id', '=', 'products.id') 
        ->join('order_statuses', 'orders.status_id', '=', 'order_statuses.id')
        ->join('addresses as addresses_seller', 'orders.seller_address_id', '=', 'addresses_seller.id')
        ->join('addresses as addresses_delivery', 'orders.delivery_address_id', '=', 'addresses_delivery.id')
        ->join('users as users_customer', 'orders.customer_id', '=', 'users_customer.id')
        ->leftjoin('users as users_delivery', 'orders.delivery_id', '=', 'users_delivery.id')
        ->groupBy('orders.id', 'orders.status_id', 'addresses_seller.street', 'addresses_seller.city', 'addresses_seller.postal_code', 'addresses_seller.country', 'addresses_delivery.street', 'addresses_delivery.city', 'addresses_delivery.postal_code', 'addresses_delivery.country')
        ;

        return $query;
    }

    public static function getOrderInfoById(int $id) : object | null
    {
        $query = self::getOrderInfo()
                ->where('orders.id', $id)
                ->first()
                ;
                
        return $query;
    } 

    public static function getOrderInfoByStatusId(int $statusId) : object | null
    {
        $query = self::getOrderInfo()
                ->where('orders.status_id', $statusId)
                ->first()
                ;
                
        return $query;
    }

    public static function getOrdersInfoForDelivery(int $deliveryId) : object
    {
        return Order::where('orders.status_id', '<=', 2)
                    ->where('orders.delivery_id', $deliveryId);
    }

}
<?php

use App\Database\Migration;

class CreateOrderProductsTable extends Migration
{
    protected $tableName = 'order_products';

    public function up()
    {
        $this->schema->create($this->tableName, function ($table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->unsignedInteger('order_id')->nullable();
            $table->unsignedInteger('product_id')->nullable();
            $table->timestamp('created_at')->default($this->schema->getConnection()->raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default($this->schema->getConnection()->raw('CURRENT_TIMESTAMP'));
            $table->timestamp('deleted_at')->nullable();
        
            $table->foreign('order_id', 'fk_order_id_Orders_id')
                    ->on('orders')
                    ->references('id')
                    ->onDelete('set null');

            $table->foreign('product_id', 'fk_product_id_Orders_id')
                    ->on('products')
                    ->references('id')
                    ->onDelete('set null');
        });
    }

    public function down()
    {
        $this->schema->dropIfExists($this->tableName);
    }
}
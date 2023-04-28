<?php

use App\Database\Migration;

class CreateCustomerOrdersTable extends Migration
{
    protected $tableName = 'customer_orders';

    public function up()
    {
        $this->schema->create($this->tableName, function ($table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->unsignedInteger('customer_id')->nullable();
            $table->unsignedInteger('order_id')->nullable();
            $table->timestamp('created_at')->default($this->schema->getConnection()->raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default($this->schema->getConnection()->raw('CURRENT_TIMESTAMP'));
            $table->timestamp('deleted_at')->nullable();
        
            $table->foreign('customer_id', 'fk_customer_id_Customers_id')
                    ->on('users')
                    ->references('id')
                    ->onDelete('set null');

            $table->foreign('order_id', 'fk_1_order_id_Orders_id')
                    ->on('orders')
                    ->references('id')
                    ->onDelete('set null');
        });
    }

    public function down()
    {
        $this->schema->dropIfExists($this->tableName);
    }
}
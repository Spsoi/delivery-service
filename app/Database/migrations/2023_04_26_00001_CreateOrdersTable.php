<?php

use App\Database\Migration;

class CreateOrdersTable extends Migration
{
    protected $tableName = 'orders';

    public function up()
    {
        $this->schema->create($this->tableName, function ($table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->timestamp('delivery_deadline')->nullable(); // дата когда нужно доставить
            $table->timestamp('delivery_completed_at')->nullable(); // дата доставки
            $table->unsignedInteger('customer_id')->nullable();
            $table->unsignedInteger('seller_id')->nullable();
            $table->unsignedInteger('delivery_id')->nullable();
            $table->string('name')->nullable();
            $table->unsignedInteger('seller_address_id')->nullable();
            $table->unsignedInteger('delivery_address_id')->nullable();
            $table->decimal('delivery_price', 10, 2)->nullable();
            $table->decimal('products_price', 10, 2)->nullable();
            $table->decimal('total_price', 10, 2)->nullable();
            $table->string('description')->nullable();
            $table->unsignedInteger('status_id')->nullable();
            $table->timestamp('created_at')->default($this->schema->getConnection()->raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default($this->schema->getConnection()->raw('CURRENT_TIMESTAMP'));
            $table->timestamp('deleted_at')->nullable();

            
            $table->foreign('customer_id', 'fk_Orders_customer_id_Users_id_foreign')
                    ->on('users')
                    ->references('id')
                    ->onDelete('set null')
                    ;

            $table->foreign('seller_id', 'fk_Orders_seller_id_Users_id_foreign')
                    ->on('users')
                    ->references('id')
                    ->onDelete('set null')
                    ;

            $table->foreign('delivery_id', 'fk_Orders_delivery_id_Users_id_foreign')
                    ->on('users')
                    ->references('id')
                    ->onDelete('set null')
                    ;

            $table->foreign('seller_address_id', 'fk_seller_address_id_user_id_foreign')
                    ->on('addresses')
                    ->references('id')
                    ->onDelete('set null')
                    ;

            $table->foreign('delivery_address_id', 'fk_delivery_address_id_user_id_foreign')
                    ->on('addresses')
                    ->references('id')
                    ->onDelete('set null')
                    ;
        
            $table->foreign('status_id', 'fk_status_id_Order_statuses_id_foreign')
                    ->on('order_statuses')
                    ->references('id')
                    ->onDelete('set null')
                    ;
        });
    }

    public function down()
    {
        $this->schema->dropIfExists($this->tableName);
    }
}
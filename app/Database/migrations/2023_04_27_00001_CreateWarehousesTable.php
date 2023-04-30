<?php

use App\Database\Migration;

class CreateWarehousesTable extends Migration
{
    protected $tableName = 'warehouse';

    public function up()
    {
        $this->schema->create($this->tableName, function ($table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->unsignedInteger('seller_id')->nullable();
            $table->unsignedInteger('address_id')->nullable();
            $table->boolean('is_warehouse');
            $table->timestamp('created_at')->default($this->schema->getConnection()->raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default($this->schema->getConnection()->raw('CURRENT_TIMESTAMP'));
            $table->timestamp('deleted_at')->nullable();
        
            $table->foreign('seller_id', 'fk_Warehouse_seller_id_Users_id_foreign')
                    ->references('id')
                    ->on('users')
                    ->onDelete('set null');

            $table->foreign('address_id', 'fk_Warehouse_address_id_Addresses_id_foreign')
                    ->references('id')
                    ->on('addresses')
                    ->onDelete('set null');

        });
    }

    public function down()
    {
        $this->schema->dropIfExists($this->tableName);
    }
}
<?php

use App\Database\Migration;

class CreateWarehousesTable extends Migration
{
    protected $tableName = 'warehouse';

    public function up()
    {
        $this->schema->create($this->tableName, function ($table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('address_id')->nullable();
            $table->boolean('is_warehouse');
            $table->timestamp('created_at')->default($this->schema->getConnection()->raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default($this->schema->getConnection()->raw('CURRENT_TIMESTAMP'));
            $table->timestamp('deleted_at')->nullable();
        
            $table->foreign('user_id', 'fk_warehouse_user_id_users_id_foreign')
                    ->references('id')
                    ->on('users')
                    ->onDelete('set null');

            $table->foreign('address_id', 'fk_warehouse_address_id_addresses_id_foreign')
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
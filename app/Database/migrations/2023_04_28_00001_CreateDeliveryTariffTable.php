<?php

use App\Database\Migration;

class CreateDeliveryTariffTable extends Migration
{
    protected $tableName = 'delivery_tariffs';

    public function up()
    {
        $this->schema->create($this->tableName, function ($table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->unsignedInteger('from_address_id')->nullable();
            $table->unsignedInteger('to_address_id')->nullable();
            $table->decimal('distance', 10, 2);
            $table->decimal('price', 10, 2);
            $table->timestamp('created_at')->default($this->schema->getConnection()->raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default($this->schema->getConnection()->raw('CURRENT_TIMESTAMP'));
            $table->timestamp('deleted_at')->nullable();
        
            $table->foreign('from_address_id', 'fk_tariffs_from_address_id_addresses_id_foreign')
                    ->references('id')
                    ->on('addresses')
                    ->onDelete('set null');

            $table->foreign('to_address_id', 'fk_tariffs_to_address_id_addresses_id_foreign')
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
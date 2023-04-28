<?php

use App\Database\Migration;

class CreateAddressTable extends Migration
{
    protected $tableName = 'addresses';

    public function up()
    {
        $this->schema->create($this->tableName, function ($table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('street');
            $table->string('city');
            $table->string('postal_code');
            $table->string('country');
            $table->decimal('price', 10, 8);
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->timestamp('created_at')->default($this->schema->getConnection()->raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default($this->schema->getConnection()->raw('CURRENT_TIMESTAMP'));
            $table->timestamp('deleted_at')->nullable();
        });
    }

    public function down()
    {
        $this->schema->dropIfExists($this->tableName);
    }
}
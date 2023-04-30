<?php

use App\Database\Migration;

class CreateOrderStatusesTable extends Migration
{
    protected $tableName = 'order_statuses';

    public function up()
    {
        $this->schema->create($this->tableName, function ($table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('name')->nullable();
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
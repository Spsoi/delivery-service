<?php

use App\Database\Migration;

class CreateRatelimitsTable extends Migration
{
    protected $tableName = 'rate_limit';

    public function up()
    {
        $this->schema->create($this->tableName, function ($table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->unsignedBigInteger('user_id');
            $table->integer('requests')->default(0);
            $table->timestamp('created_at')->default($this->schema->getConnection()->raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default($this->schema->getConnection()->raw('CURRENT_TIMESTAMP'));
            // $table->index(['user_id', 'updated_at']);
        });
    }

    public function down()
    {
        $this->schema->dropIfExists($this->tableName);
    }
}
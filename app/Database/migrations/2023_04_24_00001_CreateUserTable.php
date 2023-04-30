<?php

// namespace App\Database\migrations;

use App\Database\Migration;

class CreateUserTable extends Migration
{
    protected $tableName = 'users';

    public function up()
    {
        $this->schema->create($this->tableName, function ($table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('password');
            $table->unsignedInteger('role_id')->nullable();
            $table->timestamp('created_at')->default($this->schema->getConnection()->raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default($this->schema->getConnection()->raw('CURRENT_TIMESTAMP'));
            $table->timestamp('deleted_at')->nullable();

            $table->foreign('role_id', 'fk_users_roles_role_id_foreign')
                    ->references('id')
                    ->on('users_roles')
                    ->onDelete('set null')
                    ;
        });
    }

    public function down()
    {
        $this->schema->dropIfExists($this->tableName);
    }
}


<?php
// namespace App\Database\migrations;

use App\Database\Migration;

class CreateUsersRolesTable extends Migration
{
    protected $tableName = 'users_roles';

    public function up()
    {
        $this->schema->create($this->tableName, function ($table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
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

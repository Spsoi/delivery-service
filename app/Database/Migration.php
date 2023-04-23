<?php

namespace App\Database;

use Illuminate\Database\Capsule\Manager as Capsule;

abstract class Migration
{
    protected $schema;
    protected $tableName;

    public function __construct()
    {
        $this->schema = Capsule::schema();
    }

    public function getTableName()
    {
        return $this->tableName;
    }

    abstract public function up();

    abstract public function down();
}
<?php

namespace App\Models;

use App\Database\DB as DBConnection;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected $guarded = ['id'];

    public function __construct () {
        $capsule = DBConnection::getInstance(); // подключаем базу данных
        $connection = $capsule->getConnection();
        $connection->disconnect();
    }

    public function getTableName()
    {
        return $this->table;
    }

    // Добавьте здесь общие методы и свойства для всех моделей
}
<?php

namespace App\Database;

use App\Database\DB as DBConnection;
use PDOException;

class RunMigration
{
    protected $schema;

    public function __construct()
    {
    }

    public function runMigration(): void
    {
        $capsule = DBConnection::getInstance();
        $connection = $capsule->getConnection();

        try {
            $exists = $connection->getPdo();
        } catch (PDOException $e) {
            // костыль, разобратся, почему не создаёт Eloquent ORM
            $conn = DBConnection::alternativeConnect();
            $dbname = env('DB_DATABASE');

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "CREATE DATABASE $dbname";

            if ($conn->query($sql) === TRUE) {
                echo "Database created successfully";
            } else {
                echo "Error creating database: " . $conn->error;
            }
            $conn->close();
        }
        $this->runMigrations($capsule);
        $connection->disconnect();
    }

    public function runMigrations($capsule): void
    {
        $connection = $capsule->getConnection();

        // Получаем список всех php-файлов в папке migrations
        $files = glob(__DIR__ . '/migrations/*.php');
        natcasesort($files);
        foreach ($files as $str) {
            // Получаем имя класса из имени файла
            $fileName = str_replace('.php', '', basename($str));
            
            $parts = explode("_", $fileName);
            $className = end($parts);
            // Подключаем файл и создаем экземпляр класса миграции
            // $str = '\App\Database\migrations' . "\\$fileName";
            require_once  'migrations/'.$fileName.'.php';

            $migration = new $className;

            // Проверяем, существует ли таблица в базе данных
            $tableName = $migration->getTableName();
            $exists = $connection->getSchemaBuilder()->hasTable($tableName);

            if (!$exists) {
                // Если таблицы нет, создаем ее
                $migration->up();
            }
        }
    }
}

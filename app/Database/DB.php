<?php

namespace App\Database;

use Illuminate\Database\Capsule\Manager as Capsule;

class DB
{
    private static $instance = null;
    private $capsule;

    private function __construct()
    {
        try {
            $capsule = new Capsule;
            $connsections = connections();
            $capsule->addConnection($connsections['mysql']);
            $capsule->setAsGlobal();
            $capsule->bootEloquent();
            $this->capsule = $capsule;
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public static function alternativeConnect()
    {
        $host = env('DB_HOST');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD');

        try {
            return new \mysqli($host, $username, $password);
        } catch (\PDOException $e) {
            echo "Alternative Connection failed: " . $e->getMessage();
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance->capsule;
    }
}

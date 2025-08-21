<?php

declare(strict_types=1);

/**
 * Class Database
 * 
 * Singleton untuk koneksi MySQL.
 */
class Database
{
    /**
     * @var \PDO|null
     */
    private static ?\PDO $connection = null;

    /**
     * Mendapatkan koneksi PDO (singleton).
     *
     * @return \PDO
     */
    public static function getConnection(): \PDO
    {
        if (self::$connection === null) {
            $host = 'localhost';
            $dbname = 'oop_assignment'; 
            $username = 'root';         
            $password = '';            

            $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

            try {
                self::$connection = new \PDO($dsn, $username, $password);
                self::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                self::initSchema();
            } catch (\PDOException $e) {
                die("Koneksi database gagal: " . $e->getMessage());
            }
        }

        return self::$connection;
    }

    /**
     * 
     *
     * @return void
     */
    private static function initSchema(): void
    {
        $query = "
            CREATE TABLE IF NOT EXISTS orders (
                id INT AUTO_INCREMENT PRIMARY KEY,
                customer_name VARCHAR(100) NOT NULL,
                total_price DECIMAL(10,2) NOT NULL
            )
        ";
        self::$connection->exec($query);
    }
}

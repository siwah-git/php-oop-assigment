<?php

declare(strict_types=1);

/**
 * Class Database
 * 
 * Singleton untuk koneksi SQLite.
 */
class Database
{
    /**
     * @var \PDO
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
            self::$connection = new \PDO('sqlite:data/orders.db');
            self::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            // Buat tabel jika belum ada
            self::initSchema();
        }

        return self::$connection;
    }

    /**
     * Inisialisasi schema tabel orders jika belum ada.
     *
     * @return void
     */
    private static function initSchema(): void
    {
        $query = "
            CREATE TABLE IF NOT EXISTS orders (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                customer_name TEXT NOT NULL,
                total_price REAL NOT NULL
            )
        ";
        self::$connection->exec($query);
    }
}

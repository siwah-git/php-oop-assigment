<?php

declare(strict_types=1);

/**
 * Class Database
 *
 * A Singleton for a MySQL connection.
 */
class Database {

    /**
     * @var \PDO|null The PDO connection instance.
     */
    private static ?\PDO $connection = null;

    /**
     * Gets the PDO connection (singleton pattern).
     *
     * @return \PDO The PDO connection instance.
     * @throws \PDOException If the database connection fails.
     */
    public static function getConnection(): \PDO {
        if (self::$connection === null) {
            // Note: In a production environment, these credentials should
            // be stored in an environment or configuration file.
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
                // A better OOP practice is to throw an exception instead of using die()
                // so the calling code can handle the error gracefully.
                throw new \PDOException("Database connection failed: " . $e->getMessage(), (int)$e->getCode());
            }
        }

        return self::$connection;
    }

    /**
     * Initializes the database schema by creating the `orders` table if it doesn't exist.
     *
     * @return void
     */
    private static function initSchema(): void {
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
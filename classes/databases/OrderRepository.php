<?php

declare(strict_types=1);
require_once 'Database.php';

/**
 * Class OrderRepository
 * 
 * Mengelola data orders dari database.
 */
class OrderRepository
{
    /**
     * @var \PDO
     */
    private \PDO $db;

    /**
     * OrderRepository constructor.
     */
    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    /**
     * Menambahkan order baru.
     *
     * @param string $customer Nama customer
     * @param float $total Total harga
     * @return void
     */
    public function createOrder(string $customer, float $total): void
    {
        $stmt = $this->db->prepare("INSERT INTO orders (customer_name, total_price) VALUES (:customer, :total)");
        $stmt->execute([
            ':customer' => $customer,
            ':total' => $total
        ]);
    }

    /**
     * Menghitung total jumlah order.
     *
     * @return int Jumlah order
     */
    public function getTotalOrders(): int
    {
        $result = $this->db->query("SELECT COUNT(*) FROM orders")->fetchColumn();
        return (int) $result;
    }

    /**
     * Menghitung rata-rata total_price.
     *
     * @return float Rata-rata nilai order
     */
    public function getAverageOrderValue(): float
    {
        $result = $this->db->query("SELECT AVG(total_price) FROM orders")->fetchColumn();
        return $result !== null ? (float) $result : 0.0;
    }
}

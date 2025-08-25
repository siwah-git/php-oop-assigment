<?php
/**
 * Class OrderRepository
 * Menangani logika akses data untuk pesanan.
 * @package Classes\Database
 */
class OrderRepository {
    /**
     * @var array sebuah array untuk mensimulasikan tabel database untuk pesanan.
     */
    private array $orders = [];

    /**
     * Membuatpesanan baru.
     *
     * @param string $customer Nama pelanggan.
     * @param float $total Total harga pesanan.
     * @return void
     */
    public function createOrder(string $customer, float $total): void { // membuat pesanan baru dan menambahkannya ke "database" simulasi.
        $id = count($this->orders) + 1; // untuk menyimpan dan mengelola data pesanan
        $this->orders[] = [ //
            'id' => $id,
            'customer_name' => $customer,
            'total_price' => $total,
        ];
        echo "Order created for {$customer} with ID {$id}." . PHP_EOL;
    }

    /**
     * Menghitung jumlah total pesanan.
     * @return int Jumlah total pesanan.
     */
    public function getTotalOrders(): int {
        return count($this->orders); // menghitung berapa banyak pesanan yang ada di dalam array $this->orders
    }

    /**
     * Menghitung nilai rata-rata dari semua pesanan.
     * @return float Nilai rata-rata pesanan.
     */
    public function getAverageOrderValue(): float {
        if (empty($this->orders)) {
            return 0.0;
        }

        $totalPrice = 0.0;
        foreach ($this->orders as $order) {
            $totalPrice += $order['total_price'];
        }

        return $totalPrice / count($this->orders); // mengembalikan total harga dibagi dengan jumlah total pesanan, menghasilkan nilai rata-rata.
    }
}
<?php
/**
 * Class OrderRepository
 * Handles data access logic for orders.
 * This is a simulation, as no real database connection is established.
 *
 * @package Classes\Database
 *
 */
class OrderRepository {
    /**
     * @var array An array to simulate a database table for orders.
     */
    private array $orders = [];

    /**
     * Creates a new order entry.
     *
     * @param string $customer The customer's name.
     * @param float $total The total price of the order.
     * @return void
     */
    public function createOrder(string $customer, float $total): void {
        $id = count($this->orders) + 1;
        $this->orders[] = [
            'id' => $id,
            'customer_name' => $customer,
            'total_price' => $total,
        ];
        echo "Order created for {$customer} with ID {$id}." . PHP_EOL;
    }

    /**
     * Calculates the total number of orders.
     *
     * @return int The total count of orders.
     */
    public function getTotalOrders(): int {
        return count($this->orders);
    }

    /**
     * Calculates the average value of all orders.
     *
     * @return float The average order value.
     */
    public function getAverageOrderValue(): float {
        if (empty($this->orders)) {
            return 0.0;
        }

        $totalPrice = 0.0;
        foreach ($this->orders as $order) {
            $totalPrice += $order['total_price'];
        }

        return $totalPrice / count($this->orders);
    }
}
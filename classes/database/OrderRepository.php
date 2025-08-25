<?php

/**
 * Class OrderRepository
 * Handles the data access logic for orders.
 */
class OrderRepository {

    /**
     * An array to simulate a database table for orders.
     * @var array
     */
    private array $orders = [];

    /**
     * Creates a new order and adds it to the simulated database.
     *
     * @param string $customer The customer's name.
     * @param float $total The total price of the order.
     * @return int The ID of the newly created order.
     */
    public function createOrder(string $customer, float $total): int {
        $id = count($this->orders) + 1;
        $this->orders[] = [
            'id' => $id,
            'customer_name' => $customer,
            'total_price' => $total,
        ];
        return $id;
    }

    /**
     * Calculates the total number of orders.
     * @return int The total number of orders.
     */
    public function getTotalOrders(): int {
        return count($this->orders);
    }

    /**
     * Calculates the average value of all orders.
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
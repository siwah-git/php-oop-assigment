<?php
/**
 * Class UserRepository
 * Handles data access logic for orders.
 * This is a simulation, as no real database connection is established.
 *
 * @package Classes\Database
 *
 */
class UserRepository {
    /**
     * @var array An array to simulate a database table for orders.
     */
    private array $users = [];

    /**
     * Creates a new order entry.
     *
     * @param string $name Nama pengguna.
     * @param string $email Email pengguna.
     * @return void
     */
    public function createUser(string $name, string $email): void {
        $id = count($this->users) + 1;
        $this->users[] = [
            'id' => $id,
            'nama' => $name,
            'email' => $email,
        ];
        echo "User created for {$name} with ID {$id}." . PHP_EOL;
    }

    /** 
     * Calculates the total number of orders.
     *
     * @return array The .
     */
    public function getAllUsers(): array {
        return $this->users;
    }

    /**
     * Calculates the average value of all orders.
     *
     * @return string The average order value.
     */
    public function findByEmail(string $email): ?array {
        foreach ($this->users as $user) {
            if ($user['email'] === $email ) {
                return $user;
            }
        }
        return null;
    }
}


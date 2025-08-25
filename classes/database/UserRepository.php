<?php

/**
 * UserRepository
 * 
 * A simple in-memory repository for storing and retrieving users.
 */
class UserRepository {
    /**
     * Stored users as an array of associative arrays.
     * @var array<int, array{id:int, nama:string, email:string}>
     */
    private array $users = [];

    /**
     * Add a new user to the repository.
     * 
     * @param string $name  User's name.
     * @param string $email User's email.
     * @return void
     */
    public function createUser(string $name, string $email): void {
        $id = count($this->users) + 1;
        $this->users[] = [
            'id'    => $id,
            'nama'  => $name,
            'email' => $email,
        ];
        echo "User created for {$name} with ID {$id}." . PHP_EOL;
    }

    /**
     * Get all stored users.
     * 
     * @return array<int, array{id:int, nama:string, email:string}>
     */
    public function getAllUsers(): array {
        return $this->users;
    }

    /**
     * Find a user by email address.
     * 
     * @param string $email Email to search for.
     * @return array{id:int, nama:string, email:string}|null Returns user if found, null otherwise.
     */
    public function findByEmail(string $email): ?array {
        foreach ($this->users as $user) {
            if ($user['email'] === $email) {
                return $user;
            }
        }
        return null;
    }
}

?>
<?php
/**
 * Class UserRepository
 * Handles data access logic for orders.
 * This is a simulation, as no real database connection is established.
 *
 * @package Classes\Database
 *
 */
class BookRepository {
    /**
     * @var array An array to simulate a database table for orders.
     */
    private array $books = [];
   
    /**
     * Creates a new order entry.
     *
     * @param string $title judul buku.
     * @param string $author penulis.
     * @param string $year tahun terbit
     * @return void
     */
    public function createBook(string $title, string $author, string $year): void {
        $id = count($this->books) + 1;
        $this->books[] = [
            'id' => $id,
            'title' => $title,
            'author' => $author,
            'year' => $year
        ];
        echo "Book created for {$title} with ID {$id}." . PHP_EOL;
    }

    /**
     * Calculates the average value of all orders.
     *
     * @return string The average order value.
     */
    public function findByAuthor(string $author): ?array {
        foreach ($this->books as $books) {
            if ($books['author'] === $author ) {
                return $books;
            }
        }
        return null;
    }

    /**
     * Calculates the average value of all orders.
     *
     * @return string The average order value.
     */
    public function deleteById(int $id): ?array {
        foreach ($this->books as $books) {
            if ($books['id'] === $id ) {
                return $books;
            }
        }
        return null;
    }
}


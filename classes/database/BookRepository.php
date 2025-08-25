<?php
/**
 * Class BookRepository
 * Handles data access logic for books.
 * This is a simulation, as no real database connection is established.
 *
 * @package Classes\Database
 */
class BookRepository {
    /**
     * @var array An array to simulate a database table for books.
     */
    private array $books = [];
   
    /**
     * Creates a new book entry.
     *
     * @param string $title  The title of the book.
     * @param string $author The author of the book.
     * @param string $year   The publication year of the book.
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
     * Finds all books by the given author.
     *
     * @param string $author The author's name to search for.
     * @return array An array of books written by the given author. 
     *               Returns an empty array if no books are found.
     */
    public function findByAuthor(string $author): array {
        $result = [];
        foreach ($this->books as $book) {
            if ($book['author'] === $author) {
                $result[] = $book;
            }
        }
        return $result;
    }

    /**
     * Deletes a book by its ID.
     *
     * @param int $id The ID of the book to delete.
     * @return array|null The deleted book data if found, null otherwise.
     */
    public function deleteById(int $id): ?array {
        foreach ($this->books as $key => $books) {
            if ($books['id'] === $id ) {
                unset($this->books[$key]);
                return $books;
            }
        }
        return null;
    }

    /**
     * Updates a book by its ID.
     *
     * @param int $id The ID of the book.
     * @param string $title The new title of the book.
     * @param string $author The new author of the book.
     * @param string $year The new publication year of the book.
     * @return array|null The updated book if found, null otherwise.
     */
    public function updateBook(int $id, string $title, string $author, string $year): ?array {
        foreach ($this->books as $key => $book) {
            if ($book['id'] === $id) {
                $this->books[$key]['title'] = $title;
                $this->books[$key]['author'] = $author;
                $this->books[$key]['year'] = $year;
                return $this->books[$key];
            }
        }
        return null;
    }
}
<?php


class BookRepository {
    public $connsql;

    public function __construct(mysqli  $connsql) {//construc menerima koneksi dari mysql
        $this->connsql; 
    }

    //membuat data buku baru berdasarkan title, author dan year
    public function createBook(string $title, string $author, int $year): bool {
        $sql = "INSERT INTO book (title, author, year) VALUES (?,?,?)";
        $statement = $this->connsql->prepare($sql);
        if (!$statement) {
            die("Prepare failed:" . $this->connsql->error);
        }
        $statement->bind_param("ssi", $title, $author, $year);
        return $statement->execute();

    }

    //mencari buku erdasarkan author
    public function findBookByAuthor(string $author): array {
        $sql = "SELECT * FROM book WHERE author = ?";
        $statement = $this->connsql->prepare($sql);
        if(!$statement) {
            die("Prepare failed: " . $this->connsql->error);
        }
        $statement->bind_param("s", $author);
        $statement->execute();
        $result = $statement->get_result();

        $books = [];
        while ($row = $result->fetch_assoc()) {
            $books[] = $row;
        }
        return $books;
    }


    //menghapus buku berdasarkan id buku

    public function deleteBook(int $id): bool {
        $sql = "DELETE FROM book WHERE id = ?";
        $statement = $this->connsql->prepare($sql);
        if (!$statement) {
            die("Prepare failed: " .  $this->connsql->error);

        }
        $statement->bind_param("i", $id);
        return $statement->execute();
    }

}
?>
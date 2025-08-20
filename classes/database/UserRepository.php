<?php

class UserRepository {
    private $db;

    public function __construct(Database $database){
        $this->db = $database->connect();
    }

    public function createUser($name, $email){
        $sql = "INSERT INTO users (nama, email) VALUES ('$name', '$email')";
        return $this->$db->query($sql);
    }

    public function getAllUsers() {
        $result =$this->$db->query("SELECT * FROM users");
        return $result ->fetch_all(MYSQLI_ASSOC);
    }

    public function findByEmail($email) {
         $result =$this->$db->query("SELECT * FROM users WHERE email = '$email'");
         return $result ->fetch_assoc;
    }
}
?>
<?php

class User {
    public $name;
    public $email;


//method constructot untuk mendeteksi user atau inisialisasi

public function __construct(string $myname, string $myemail) {
    $this->name = $myname;
    $this->email = $myemail;

}
//method untuk menyimpan  data user ke storage

public function saveToStorage(Storage $storage) : void {
    $data = $this->name . " = " . $this->email ;
    $storage->save($data);

}
}


<?php

class ArrayTransformer {
    public $numbers; 


//method
public function __construct(array $transformer){
    $this->numbers = $transformer;

}

public function mapSquare(){
    return array_map(function($transformer) { //method yang akan menampilkan angka kuadrat
       return $transformer * $transformer;
    }, $this->numbers);

}

public function filterEven(){
    return array_filter($this->numbers, function($transformer) { //method yang akan menampilkan angka genap saja
        return $transformer % 2 == 0;
    });
}

public function sum() {
        return array_sum($this->numbers); //fungsi akan menjumlahkan semua angka 
    }
}



?>

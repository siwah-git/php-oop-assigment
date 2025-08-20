<?php

class ArrayTransformer {
    //identifikasi objek yang akan di buat
    public $transformer;
    
    public function __construct($transformer) { //constructor menerima angka atau numbers
        $this->transformer = $transformer;
    }

    function get_name() {
         return $this->transformer;
    }

    public function mapSquare($transformer) {
        return array_map(fn($transformer) => $transformer * $transformer, $this -> transformer); // fungsi akan mengembalikan angka baru dengan perhitunga kuadrat di setiap angka
    }

    public function filterEven(array $transformer) {
        return array_filter($this->transformer, fn ($transformer) => $transformer % 2 == 0);//fungsi akan mengembalikan array hanya angka yang genap
    }

    
    public function sum() {
        return array_sum($this->transformer); //fungsi akan menjumlahkan semua angka 
    }

}


$transformer = new ArrayTransformer([1,2,3,4,5,6,7,8,9]);
print_r($transformer->mapSquare($transfomer));
print_r($transformer->filterEven($transfomer));
echo $transfomer->sum();

echo $transformer->get_name();

?>
<?php
class PrimeGenerator {
   public $limit; // to store the upper limit

   //receives the limit number
   public function __construct($limit){
    $this->limit = $limit;
   }

   //method to check if a number is prime 
   public function isPrime($number){
    if ($number < 2 ) return false; //number less than 2 are not prime
    for ($i = 2; $i <= sqrt($number); $i++){
        if ($number % $i ==0) {
            return false; //not prime
        }
    }
   return true; // number is prime
}

// method to generate all prime numbers up to the limit
    public function generate() {
    $primes = [];
    for ($i = 2; $i <= $this ->limit; $i++){
        if ($this->isPrime($i)){
            $primes[] = $i; //add prime number to the array
        }
    }
    return $primes;
}
}

$prime = new PrimeGenerator(20);
?>
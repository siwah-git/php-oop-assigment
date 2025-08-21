<?php
/**
 * Class PrimeGenerator
 * Menghasilkan dan memeriksa bilangan prima hingga batas tertentu.
 * @package Classes\Basics
 */
class PrimeGenerator {
    /**
     * @var int Batas atas untuk menghasilkan bilangan prima.
     */
    private int $limit;

    /**
     * PrimeGenerator constructor.
     * @param int $limit Batas atas yang akan ditetapkan.
     */
    public function __construct(int $limit) {
        $this->limit = $limit;
    }

    /**
     * Memeriksa apakah sebuah angka adalah bilangan prima.
     *
     * @param intAngka yang akan diperiksa.
     * @return bool True jika angka tersebut prima, false sebaliknya.
     */
    public function isPrime(int $number): bool {
        if ($number <= 1) {
            return false;
        }
        for ($i = 2; $i <= sqrt($number); $i++) {
            if ($number % $i === 0) {
                return false;
            }
        }
        return true;
    }

    /**
     * * Menghasilkan array semua bilangan prima hingga batas yang ditetapkan.
     * @return array Array yang berisi semua bilangan prima.
     */
    public function generate(): array {
        $primes = [];
        for ($i = 2; $i <= $this->limit; $i++) {
            if ($this->isPrime($i)) {
                $primes[] = $i;
            }
        }
        return $primes;
    }
}
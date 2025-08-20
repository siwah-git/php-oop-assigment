<?php

declare(strict_types=1);

/**
 * Class PrimeGenerator
 * 
 * Menghasilkan bilangan prima hingga nilai batas tertentu.
 */
class PrimeGenerator
{
    /**
     * @var int Batas maksimum bilangan prima
     */
    private int $limit;

    /**
     * PrimeGenerator constructor.
     *
     * @param int $limit Batas atas untuk mencari bilangan prima
     */
    public function __construct(int $limit)
    {
        $this->limit = $limit;
    }

    /**
     * Menghasilkan array bilangan prima hingga batas.
     *
     * @return int[] Array bilangan prima
     */
    public function generate(): array
    {
        $primes = [];

        for ($i = 2; $i <= $this->limit; $i++) {
            if ($this->isPrime($i)) {
                $primes[] = $i;
            }
        }

        return $primes;
    }

    /**
     * Mengecek apakah sebuah bilangan adalah bilangan prima.
     *
     * @param int $number Angka yang akan dicek
     * @return bool True jika prima, false jika tidak
     */
    public function isPrime(int $number): bool
    {
        if ($number < 2) {
            return false;
        }

        for ($i = 2; $i <= sqrt($number); $i++) {
            if ($number % $i === 0) {
                return false;
            }
        }

        return true;
    }
}

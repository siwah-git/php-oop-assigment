<?php
/**
 * Class PrimeGenerator
 * Generates and checks for prime numbers up to a given limit.
 *
 * @package Classes\Basics
 *
 */
class PrimeGenerator {
    /**
     * @var int The upper limit for prime number generation.
     */
    private int $limit;

    /**
     * PrimeGenerator constructor.
     *
     * @param int $limit The number to set as the upper limit.
     */
    public function __construct(int $limit) {
        $this->limit = $limit;
    }

    /**
     * Checks if a number is a prime number.
     *
     * @param int $number The number to check.
     * @return bool True if the number is prime, false otherwise.
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
     * Generates an array of all prime numbers up to the set limit.
     *
     * @return array An array containing all prime numbers.
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
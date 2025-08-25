<?php

class ArrayTransformer {
    public $numbers; 


/**
 * Undocumented function
 *
 * @param array $transformer
 */
public function __construct(array $transformer){
    $this->numbers = $transformer;

}

public function mapSquare(){
    return array_map(function($transformer) { //method that will display the square number
       return $transformer * $transformer;
    }, $this->numbers);

}

/**
 * Undocumented function
 *
 * @return void
 */
public function filterEven(){
    return array_filter($this->numbers, function($transformer) { //method that will display only even numbers
        return $transformer % 2 == 0;
    });
}

/**
 * Undocumented function
 *
 * @return void
 */
public function sum() {
        return array_sum($this->numbers); //the function will add up all the numbers 
    }
}



?>
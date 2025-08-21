<?php

class JsonMapper {
    public $data; 


//method
public function __construct(string $user){
    $this->data = json_decode($user, true);// constructor menerima string data JSON
    
    if ($this->data === null) {
        echo "<pre>JSON Error: " . json_last_error_msg() . "</pre>";
    }

}

public function getKeys() : array {
    return $this->extractKeys($this->data); // method untuk mengambil kunci

}
//method yang hanya dipakai internal class atau tidak bisa public

private function extractKeys(array $array, string $prefix = ''): array {
    $keys = [];
    foreach ($array as $key => $value) {
        $fullKey = $prefix === '' ? $key : $prefix . '.' . $key;
        $keys[] = $fullKey;
        if (is_array($value)) {
            $keys = array_merge($keys, $this->extractKeys($value, $fullKey));
        }
    }

    return $keys; //mengembalikan variabel keys
}
//method untuk mengubah JSON nested menjadi array 1 dimensi (dengan prefix untuk menggabungkan dengan tanda titik)
public function flatten(): array {
    return $this->flattenArray($this->data);
    }

    private function flattenArray( array $array, string $prefix = '' ) : array {
        $result = [];
        foreach ($array as $key => $value) {
            $fullKey = $prefix === '' ? $key : $prefix . '.' . $key;
            if (is_array($value)) {
                $result = array_merge($result, $this->flattenArray($value, $fullKey));
            } else {
                $result[$fullKey] = $value;
            }
        }
        return $result;
    }
}
?>

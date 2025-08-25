<?php

class JsonMapper {
    public $data; 


/**
 * Undocumented function
 *
 * @param string $user
 */
public function __construct(string $user){
    $this->data = json_decode($user, true);// constructor accepts JSON data string
    
    if ($this->data === null) {
        echo "<pre>JSON Error: " . json_last_error_msg() . "</pre>";
    }

}

public function getKeys() : array {
    return $this->extractKeys($this->data); // method to retrieve the key

}

/**
 * @param string $name
 */

private function extractKeys(array $array, string $prefix = ''): array {
    $keys = [];
    foreach ($array as $key => $value) {
        $fullKey = $prefix === '' ? $key : $prefix . '.' . $key;
        $keys[] = $fullKey;
        if (is_array($value)) {
            $keys = array_merge($keys, $this->extractKeys($value, $fullKey));
        }
    }

    return $keys; //returns the keys variable
}
/**
 * Undocumented function
 *
 * @return array
 */
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
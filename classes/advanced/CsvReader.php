<?php
/**
 * Class CsvReader
 * Reads a CSV file and processes its data.
 *
 * @package Classes\Advanced
 *
 */
class CsvReader {
    /**
     * @var string The path to the CSV file.
     */
    private string $filePath;

    /**
     * CsvReader constructor.
     *
     * @param string $filePath The path to the CSV file.
     */
    public function __construct(string $filePath) {
        $this->filePath = $filePath;
    }

    /**
     * Gets the header row of the CSV file.
     *
     * @return array The header row as an array of strings.
     */
    public function getHeader(): array {
        if (!file_exists($this->filePath)) {
            return [];
        }
        $file = fopen($this->filePath, 'r');
        $header = fgetcsv($file);
        fclose($file);
        return $header ?: [];
    }

    /**
     * Gets all data rows of the CSV file as an associative array.
     *
     * @return array An array of associative arrays, where each array represents a row.
     */
    public function getRows(): array {
        if (!file_exists($this->filePath)) {
            return [];
        }
        $rows = [];
        $file = fopen($this->filePath, 'r');
        $header = fgetcsv($file); // Read the header
        if (!$header) {
            fclose($file);
            return [];
        }

        while (($data = fgetcsv($file)) !== false) {
            $row = [];
            foreach ($header as $key => $column) {
                $row[trim($column)] = $data[$key];
            }
            $rows[] = $row;
        }

        fclose($file);
        return $rows;
    }
}
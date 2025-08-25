<?php
/**
 * Class CsvReader
 * Reads and processes data from a CSV file.
 */
class CsvReader {

    /**
     * The file path to the CSV.
     * @var string
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
     * Gets the header row from the CSV file.
     *
     * @return array The header row as an array of strings.
     */
    public function getHeader(): array {
        if (!file_exists($this->filePath) || !is_readable($this->filePath)) {
            return [];
        }

        $file = fopen($this->filePath, 'r');
        if ($file === false) {
            return [];
        }
        
        $header = fgetcsv($file);
        fclose($file);
        
        return $header ? array_map('trim', $header) : [];
    }

    /**
     * Gets all data rows from the CSV file as an array.
     *
     * @return array An array where each element represents a row.
     */
    public function getRows(): array {
        if (!file_exists($this->filePath) || !is_readable($this->filePath)) {
            return [];
        }

        $rows = [];
        $file = fopen($this->filePath, 'r');
        if ($file === false) {
            return [];
        }

        $header = fgetcsv($file);
        if (!$header) {
            fclose($file);
            return [];
        }
        
        $trimmedHeader = array_map('trim', $header);

        while (($data = fgetcsv($file)) !== false) {
            if (count($data) !== count($trimmedHeader)) {
                // Skips inconsistent rows or handles them as needed.
                continue;
            }
            $rows[] = array_combine($trimmedHeader, $data);
        }

        fclose($file);
        return $rows;
    }
}
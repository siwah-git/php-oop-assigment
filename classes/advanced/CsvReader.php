<?php

declare(strict_types=1);

/**
 * Class CsvReader
 * 
 * Membaca file CSV dan mengembalikan data sebagai array asosiatif.
 */
class CsvReader
{
    /**
     * @var string Path ke file CSV
     */
    private string $filePath;

    /**
     * CsvReader constructor.
     *
     * @param string $filePath Lokasi file CSV
     */
    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * Mengambil header dari file CSV (baris pertama).
     *
     * @return array Header sebagai array string
     */
    public function getHeader(): array
    {
        $file = fopen($this->filePath, 'r');
        if (!$file) {
            throw new RuntimeException("File tidak bisa dibuka: {$this->filePath}");
        }

        $header = fgetcsv($file);
        fclose($file);

        return $header !== false ? $header : [];
    }

    /**
     * Mengambil semua baris setelah header sebagai array asosiatif.
     *
     * @return array Array data dari file CSV
     */
    public function getRows(): array
    {
        $file = fopen($this->filePath, 'r');
        if (!$file) {
            throw new RuntimeException("File tidak bisa dibuka: {$this->filePath}");
        }

        $header = fgetcsv($file);
        if ($header === false) {
            fclose($file);
            return [];
        }

        $rows = [];

        while (($data = fgetcsv($file)) !== false) {
            $rows[] = array_combine($header, $data);
        }

        fclose($file);
        return $rows;
    }
}

<?php
/**
 * Class CsvReader
 * Membaca file CSV dan memproses datanya.
 * @package Classes\Advanced
 */
class CsvReader {
    /**
     * @var string Jalur (path) ke file CSV.
     */
    private string $filePath;

    /**
     * CsvReader constructor.
     * @param string $filePath Jalur (path) ke file CSV.
     */
    public function __construct(string $filePath) {
        $this->filePath = $filePath;
    }

    /**
     * Mendapatkan baris header dari file CSV.
     * @return array Baris header sebagai array string.
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
     * Mendapatkan semua baris data dari file CSV sebagai array.
     * @return array setiap array merepresentasikan satu baris.
     */
    public function getRows(): array { //membaca seluruh baris data dari file CSV
        if (!file_exists($this->filePath)) {
            return [];
        }
        $rows = [];
        $file = fopen($this->filePath, 'r'); //fopen untuk buka file dalam mode baca 'r'
        $header = fgetcsv($file); // Baca header
        if (!$header) {
            fclose($file); // menutup file
            return [];
        }

        while (($data = fgetcsv($file)) !== false) { // baca setiap baris sampai habis
            $row = [];
            foreach ($header as $key => $column) { // baris diubah menjadi array
                $row[trim($column)] = $data[$key]; // trim hapus space kosong
            }
            $rows[] = $row; // baris yang sudah diiubah dikembalikan ke Rows
        }

        fclose($file);
        return $rows;
    }
}
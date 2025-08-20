<?php

declare(strict_types=1);

/**
 * Class Logger (abstract)
 * 
 * Abstraksi untuk sistem pencatatan log.
 */
abstract class Logger
{
    /**
     * Menulis pesan log.
     *
     * @param string $message Pesan yang ingin dicatat
     * @return void
     */
    abstract public function log(string $message): void;
}

<?php
namespace App\Core;

class Logger
{
    private $driver;
    private $path;
    private $level;

    public function __construct($driver, $path, $level)
    {
        $this->driver = $driver;
        $this->path = $path;
        $this->level = $level;
    }

    public function log($message, $level)
    {
        if ($this->level === 'debug' || $this->level === $level) {
            $this->writeLog($message, $level);
        }
    }

    private function writeLog($message, $level)
    {
        $logMessage = date('Y-m-d H:i:s') . ' - ' . $level . ' - ' . $message . PHP_EOL;
        file_put_contents($this->path, $logMessage, FILE_APPEND);
    }
}
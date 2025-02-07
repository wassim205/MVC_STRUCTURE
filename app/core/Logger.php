<?php

namespace App\Core;

class Logger
{
    private $path;
    private $level;

    public function __construct($path, $level)
    {
        $this->path = $path;
        $this->level = $level;
    }

    public function log($message, $level)
    {
        if ($this->level === 'debug' || $this->level === $level) {
            $this->writeLog($message, $level);
        }
    }
    public function logError($message, $level)
    {
        if ($this->level === 'error' || $this->level === $level) {
            $this->writeLog($message, $level);
        }
    }

    private function writeLog($message, $level)
    {
        $logMessage = date(format: 'Y-m-d H:i:s') . ' - ' . $level . ' - ' . $message . PHP_EOL;
        file_put_contents($this->path, $logMessage, FILE_APPEND);
    }
}

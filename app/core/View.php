<?php

namespace App\Core;

class View
{
    public static function render($view, $data = [])
    {
        extract($data);
        require __DIR__ . "/../../app/views/$view.php";
    }
}
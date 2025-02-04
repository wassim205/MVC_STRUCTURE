<?php

namespace App\Core;

class Controller{
    protected function view($view, $data = []){
        extract($data);
        require __DIR__ . "/../../app/views/$view.php";
    }
}
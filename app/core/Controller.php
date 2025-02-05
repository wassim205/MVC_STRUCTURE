<?php

namespace App\Core;

class Controller{
    protected function view($view, $data = []){
        extract($data);
        require __DIR__ . "/../../app/views/$view.php";
    }
    protected function redirect($url) {
        header("Location: {$url}");
        exit();
    }

    protected function isPost() {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }
}
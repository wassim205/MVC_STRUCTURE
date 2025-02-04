<?php
namespace App\Controllers\Front; // <-- Namespace avec majuscules
use App\Core\Controller;

class CartController extends Controller {
    public function cart() {
        $this->view('cart', ['title' => 'cart page']);
    }
}
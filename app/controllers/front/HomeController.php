<?php
namespace App\Controllers\Front; // <-- Namespace avec majuscules
use App\Core\Controller;

class HomeController extends Controller {
    public function index() {
        $this->view('home', ['title' => 'Test']);
    }
}
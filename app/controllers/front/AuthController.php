<?php
namespace App\Controllers\Front;
use App\Core\Controller;

class AuthController extends Controller {
    public function login() {
        $this->view('login', ['title' => 'login page']);
    }
    public function signup() {
        $this->view('signup', ['title' => 'signup page']);
    }
}
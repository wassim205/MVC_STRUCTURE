<?php
namespace App\Controllers\Front;
use App\Core\Controller;
use App\Models\User;

class HomeController extends Controller {
    public function index() {
        $users = User::all();
        $this->view('home', ['users' => $users]);
    }
}
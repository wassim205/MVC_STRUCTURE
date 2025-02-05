<?php
namespace App\Controllers\Front;
use App\Core\Controller;
use App\Models\User;

class UserController extends Controller {
    public function index() {
        $user = User::find($_SESSION['user_id']);
        $this->view('UserDashboard', ['user' => $user]);
    }
}
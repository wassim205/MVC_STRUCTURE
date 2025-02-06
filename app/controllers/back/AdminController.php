<?php
namespace App\Controllers\Back;
use App\Core\Controller;
use App\Models\User;

class AdminController extends Controller {
    public function index() {
        $user = User::find($_SESSION['user_id']);
        $this->view('AdminDashboard', ['user' => $user]);
    }
}
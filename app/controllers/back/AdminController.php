<?php
namespace App\Controllers\Back;
use App\Core\Controller;
use App\Core\Session;
use App\Core\View;
use App\Models\User;

class AdminController extends Controller {
    public function index() {
        $user = User::find(Session::get('user_id'));
        View::render('AdminDashboard', ['user' => $user]);
    }
}
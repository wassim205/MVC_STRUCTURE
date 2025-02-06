<?php
namespace App\Controllers\Front;
use App\Core\Controller;
use App\Core\Session;
use App\Core\View;
use App\Models\User;

class UserController extends Controller {
    public function index() {
        $user = User::find(Session::get('user_id'));
        View::render('UserDashboard', ['user' => $user]);
    }
}
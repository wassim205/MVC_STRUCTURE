<?php
namespace App\Controllers\Front;
use App\Core\Controller;
use App\Core\Logger;
use App\Core\Session;
use App\Core\View;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        try {
            // dd('here we are');
            // dd($_SESSION);
            if (Session::isset('user_id') && $_SESSION['role'] == 'user') {

                $user = User::find(Session::get('user_id'));
                View::render('UserDashboard', ['user' => $user]);
            } else {
                $this->redirect('/login');
            }
        } catch (\Exception $e) {
            $log = new Logger(__DIR__ . '/../logs/app.log', 'error');
            $log->logError($e->getMessage(), 'error');
            View::render('login', ['webError' => 'An error occurred, please try again']);
        }
    }
}
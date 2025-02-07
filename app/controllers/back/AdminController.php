<?php
namespace App\Controllers\Back;
use App\Core\Controller;
use App\Core\Session;
use App\Core\View;
use App\Core\Logger;
use App\Models\User;

class AdminController extends Controller {
    public function index() 
    {
        try {
            if (Session::isset('user_id') && $_SESSION['role'] === 'admin') {
                $user = User::find(Session::get('user_id'));
                View::render('AdminDashboard', ['user' => $user]);
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
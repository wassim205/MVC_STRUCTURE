<?php
namespace App\Controllers\Front;

use App\Core\Controller;
use App\Core\Auth;
use App\Core\Security;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {

    public function login() {
        if ($this->isPost()) {
            try {
                Security::verifyCsrfToken($_POST['_token'] ?? '');
                
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
                $password = $_POST['password'];

                if (Auth::login($email, $password)) {
                    $this->redirect('/dashboard');
                }

                throw new \Exception('Invalid email or password');

            } catch (\Exception $e) {
                return $this->view('login', [
                    'error' => $e->getMessage(),
                    'csrfToken' => Security::generateCsrfToken()
                ]);
            }
        }

        $this->view('login', [
            'csrfToken' => Security::generateCsrfToken()
        ]);
    }

    public function signup() {
        if ($this->isPost()) {
            try {
                Security::verifyCsrfToken($_POST['_token'] ?? '');

                $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
                $password = $_POST['password'];
                $username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
                $role = 'user';
                // $email = $_POST['email'];
                // $password = $_POST['password'];
                // $username = $_POST['username'];
                // $role = 'user';
                // if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // $this->redirect('/signup');

                //     throw new \Exception('Invalid email format');
                // }

                // if (User::where('email', $email)->exists()) {
                // $this->redirect('/signup');

                //     throw new \Exception('Email already registered');
                // }

                // if (strlen($password) < 8) {
                    
                // $this->redirect('/signup');
                //     throw new \Exception('Password must be 8+ characters');
                // }

                User::create([
                    'username' => $username,
                    'email' => $email,
                    'password' => $password,
                    'role' => $role
                ]);

                $this->redirect('/login');

            } catch (\Exception $e) {
                return $this->view('signup', [
                    'error' => $e->getMessage(),
                    'csrfToken' => Security::generateCsrfToken()
                ]);
            }
        }

        $this->view('signup', [
            'csrfToken' => Security::generateCsrfToken()
        ]);
    }

    public function logout() {
        Auth::logout();
        $this->redirect('/login');
    }
}
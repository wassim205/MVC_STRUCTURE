<?php
namespace App\Controllers\Front;

use App\Core\Controller;
use App\Core\Auth;
use App\Core\Security;
use App\Core\Validator;
use App\Models\User;

class AuthController extends Controller {

    public function login() {
        if ($this->isPost()) {
            try {
                Security::verifyCsrfToken($_POST['_token'] ?? '');
                
                $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
                $password = $_POST['password'];

                if (Auth::login($email, $password)) {
                    if (Auth::hasRole('user')) {
                        
                    $this->redirect('/Home');
                    }
                    else if(Auth::hasRole('admin')){
                        $this->redirect('/Admin');
                    }
                }

                throw new \Exception('Invalid email or password');

            } catch (\Exception $e) {
                return $this->view('login', [
                    'webError' => $e->getMessage(),
                    'csrfToken' => Security::generateCsrfToken()
                ]);
            }
        }

        $this->view('login', [
            'csrfToken' => Security::generateCsrfToken()
        ]);
    }

    public function signup() {
        $errors = [];
        if ($this->isPost()) {
            try {
                Security::verifyCsrfToken($_POST['_token'] ?? '');

                $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
                $password = $_POST['password'];
                $username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
                $role = User::count() == 0 ? 'admin' : 'user';

                $errors = Validator::isValidPassword($password, 'password', $errors);
                $errors = Validator::isValidUserName($username, 'username', $errors);
                $errors = Validator::isValidEmail($email, 'email', $errors);

                if (!empty($errors)) {
                    return $this->view('signup', [
                        'passwordErrors' => $errors['password'],
                        'emailErrors' => $errors['email'],
                        'userNameErrors' => $errors['username'],
                        'csrfToken' => Security::generateCsrfToken()
                    ]);
                }

                User::create([
                    'username' => $username,
                    'email' => $email,
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'role' => $role
                ]);

                $this->redirect('/login');

            } catch (\Exception $e) {
                return $this->view('signup', [
                    'webError' => $e->getMessage(),
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
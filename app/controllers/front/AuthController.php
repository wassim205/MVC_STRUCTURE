<?php

namespace App\Controllers\Front;

use App\Core\Controller;
use App\Core\Auth;
use App\Core\Security;
use App\Core\Validator;
use App\Core\View;
use App\Core\Logger;
use App\Models\User;

class AuthController extends Controller
{

    public function login()
    {
        try {
            if ($this->isPost()) {
                try {
                    Security::verifyCsrfToken($_POST['_token'] ?? '');

                    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
                    $password = $_POST['password'];

                    $errors = Validator::isValidEmail($email, 'email');
                    $errors = Validator::isValidPassword($password, 'password', $errors);

                    if (!empty($errors)) {
                        return View::render('login', [
                            'emailErrors' => $errors['email'] ?? null,
                            'passwordErrors' => $errors['password'] ?? null,
                            'csrfToken' => Security::generateCsrfToken()
                        ]);
                    }

                    if (Auth::login($email, $password)) {
                        if (Auth::hasRole('user')) {
                            $this->redirect('/Home');
                        } elseif (Auth::hasRole('admin')) {
                            $this->redirect('/Admin');
                        }
                    } else {
                        return View::render('login', [
                            'webError' => 'Invalid email or password',
                            'csrfToken' => Security::generateCsrfToken()
                        ]);
                    }
                } catch (\Exception $e) {
                    $logger = new Logger(__DIR__ . '/../logs/app.log', 'debug');
                    $logger->log($e->getMessage(), 'debug');
                    return View::render('login', [
                        'webError' => 'An error occurred while logging in',
                        'csrfToken' => Security::generateCsrfToken()
                    ]);
                }
            }

            View::render('login', [
                'csrfToken' => Security::generateCsrfToken()
            ]);
        } catch (\Exception $e) {
            $logger = new Logger(__DIR__ . '/../logs/app.log', 'debug');
            $logger->log($e->getMessage(), 'debug');
            return View::render('login', [
                'webError' => 'An unexpected error occurred',
                'csrfToken' => Security::generateCsrfToken()
            ]);
        }
    }

    public function signup()
    {
        $errors = [];
        try {
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
                    $errors = Validator::isEmailExists($email, 'email', $errors);

                    if (!empty($errors)) {
                        return View::render('signup', [
                            'passwordErrors' => $errors['password'],
                            'emailErrors' => $errors['email'],
                            'userNameErrors' => $errors['username'],
                            'csrfToken' => Security::generateCsrfToken()
                        ]);
                    }

                    User::create([
                        'username' => $username,
                        'email' => $email,
                        'password' => Security::hashPassword($password),
                        'role' => $role
                    ]);

                    $this->redirect('/login');
                } catch (\Exception $e) {
                    $logger = new Logger(__DIR__ . '/../logs/app.log', 'error');
                    $logger->logError($e->getMessage(), 'error');
                    return View::render('signup', [
                        'webError' => 'An error occurred while signing up.',
                        'csrfToken' => Security::generateCsrfToken()
                    ]);
                }
            }
            View::render('signup', [
                'csrfToken' => Security::generateCsrfToken()
            ]);
        } catch (\Exception $e) {
            $logger = new Logger(__DIR__ . '/../logs/app.log', 'error');
            $logger->logError($e->getMessage(), 'error');
            return View::render('signup', [
                'webError' => 'An unexpected error occurred.',
                'csrfToken' => Security::generateCsrfToken()
            ]);
        }
    }



    public function logout()
    {
        Auth::logout();
        $this->redirect('/login');
    }
}

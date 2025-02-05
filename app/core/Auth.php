<?php
namespace App\Core;

use App\Models\User;

class Auth {
    public static function login($email, $password) {
        $user = User::where('email', $email)->first();

        if ($user && password_verify($password, $user->password)) {
            session_regenerate_id(true);
            $_SESSION['user_id'] = $user->id;
            $_SESSION['role'] = $user->role;
            return true;
        }

        return false;
    }

    public static function logout() {
        session_destroy();
        unset($_SESSION['user_id']);
        unset($_SESSION['role']);
    }

    public static function isAuthenticated() {
        return isset($_SESSION['user_id']);
    }

    public static function getUser() {
        return self::isAuthenticated() ? User::find($_SESSION['user_id']) : null;
    }

    public static function hasRole($role) {
        return isset($_SESSION['role']) && $_SESSION['role'] === $role;
    }

}
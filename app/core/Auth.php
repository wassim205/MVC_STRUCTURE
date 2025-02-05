<?php
namespace App\Core;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Auth {
    public static function login($email, $password) {
        $user = User::where('email', $email)->first();

        if ($user && Hash::check($password, $user->password)) {
            session_regenerate_id(true);
            $_SESSION['user_id'] = $user->id;
            $_SESSION['role'] = $user->role;
            return true;
        }

        return false;
    }

    public static function logout() {
        unset($_SESSION['user']);
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
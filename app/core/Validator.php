<?php
namespace App\Core;

class Validator {
    public static function validate($data, $rules) {
        $errors = [];
        foreach ($rules as $field => $rule) {
            if (!isset($data[$field])) {
                $errors[$field] = "Le champ $field est requis.";
            }
        }
        return $errors;
    }
}
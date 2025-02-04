<?php
namespace App\Core;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class Model extends EloquentModel {
    // Configuration d'Eloquent
    public static function init() {
        $capsule = new \Illuminate\Database\Capsule\Manager;
        $capsule->addConnection(include __DIR__ . '/../../config/config.php');
        $capsule->bootEloquent();
    }
}
<?php
namespace App\Core;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Capsule\Manager as Capsule;
class Model extends EloquentModel {
    
    public static function init() {
        $capsule = new Capsule();
        $capsule->addConnection(include __DIR__ . '/../../config/config.php');
        $capsule->bootEloquent();
    }
}
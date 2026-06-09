<?php
define('BASE_PATH', dirname(__DIR__));

require_once BASE_PATH . "/config/config.php";
require_once BASE_PATH . "/core/Database.php";
require_once BASE_PATH . "/core/Model.php";
require_once BASE_PATH . "/core/Controller.php";
require_once BASE_PATH . "/core/App.php";

spl_autoload_register(function($className) {
    $modelFile = BASE_PATH . "/app/models/{$className}.php";
    if (file_exists($modelFile)) {
        require_once $modelFile;
    }
});

$app = new App();
?>
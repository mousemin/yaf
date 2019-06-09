<?php

define("ROOT_PATH", dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('APP_PATH', ROOT_PATH . 'app' . DIRECTORY_SEPARATOR);

try {
    // 添加composer
    require ROOT_PATH . 'vendor/autoload.php';
    $app  = new Yaf\Application(ROOT_PATH . "/config/application.ini");
    $app->bootstrap()->run();
} catch(Exception $e) {
    var_dump($e);
}

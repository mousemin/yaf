<?php
namespace database;

use Yaf\Dispatcher;
use Illuminate\Database\Capsule\Manager as Capsule;

class Database
{   
    /**
     * 注入Database链接参数
     *
     * @return mixed
     */
    final public static function initialization()
    {
        $config = Dispatcher::getInstance()->getApplication()->getConfig();
        // 注入mysql
        $database = $config->get('database');
        if (empty($database)) {
            throw new LogicException('database config is empty');
        }
        $database = $database->toArray();
        $capsule = new Capsule;
        foreach($database as $k => $val) {
            $capsule->addConnection($val, $k);
        }
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

    public static function __callStatic($method, $argc) {
        call_user_func_array(['\Illuminate\Database\Capsule\Manager', $method], $argc);
    }
}

<?php

namespace http;

use Yaf\Controller_Abstract;

class Controller extends Controller_Abstract
{
    public function init()
    {
        $actions = $this->actions();
        foreach($actions as $key => $class) {
            $this->actions[$key] = strtr(trim($class, '\\'), '\\', '/');
        }
    }

    /**
     * actions 优先级比直接赋值actions高
     *
     * @return array
     */
    public function actions()
    {
        return [];
    }
}
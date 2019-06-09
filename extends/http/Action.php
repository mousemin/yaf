<?php

namespace http;

use Yaf\Action_Abstract;

abstract class Action extends Action_Abstract
{
    abstract public function run();

    final public function execute()
    {
        return $this->run();
    }
}
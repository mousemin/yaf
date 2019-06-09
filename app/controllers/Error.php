<?php

use Yaf\Controller_Abstract;

class ErrorController extends Controller_Abstract
{
    public function errorAction($exception)
    {   
        // TODO:: Error render
        var_dump($exception);
        // throw $exception;
    }
}
<?php

use http\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
        echo static::class;
    }
}

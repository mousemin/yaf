<?php

use Yaf\Plugin_Abstract;
use Yaf\Request_Abstract;
use Yaf\Response_Abstract;

class JsonResponsePlugin extends Plugin_Abstract
{
    // 处理Response对象
    public function dispatchLoopShutdown(Request_Abstract $request, Response_Abstract $response)
    {
        // 设置jsonHeader
        $response->setHeader('Content-Type', 'application/json; charset=utf-8');
        // 设置跨域header
        $response->setHeader('Access-Control-Allow-Origin', '*');
        $response->setHeader('Access-Control-Allow-Headers', 'x-requested-with, content-type');
        $response->setHeader('Access-Control-Allow-Methods', 'POST, GET, PUT, DELETE');
    }
}
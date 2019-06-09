<?php

use Yaf\Plugin_Abstract;
use Yaf\Request_Abstract;
use Yaf\Response_Abstract;

class ResponsePlugin extends Plugin_Abstract
{
    // 处理Response对象
    public function dispatchLoopShutdown(Request_Abstract $request, Response_Abstract $response)
    {
        $header = $response->getHeader();
        foreach($header as $k => $v) {
            header($k . ': ' . $v);
        }
        $response->clearHeaders();
        $content = $response->getBody();
        $status = $response->getBody('status');
        $status = ($status === '') ? 200 : (int)$status;
        http_response_code($status);
        echo $content;
        $response->clearBody();
    }
}
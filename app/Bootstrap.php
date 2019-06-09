<?php

use Yaf\Dispatcher;
use Yaf\Route\Rewrite;
use Yaf\Bootstrap_Abstract;
use database\Database;

/**
 * 所有在Bootstrap类中, 以_init开头的方法, 都会被Yaf调用,
 * 这些方法, 都接受一个参数:Yaf_Dispatcher $dispatcher
 * 调用的次序, 和申明的次序相同
 */
class Bootstrap extends Bootstrap_Abstract
{   
    /**
     * 初始化添加理由
     *
     * @param Dispatcher $dispatcher
     * @return void
     */
    public function _initRouter(Dispatcher $dispatcher)
    {
        // $router = Dispatcher::getInstance()->getRouter();
        // // 路由添加
        // $phpRoute = new Rewrite('php/:action/:extension', [
        //     'controller' => 'php',
        //     'action'    => ':action'
        // ]);
        // $router->addRoute('php', $phpRoute);
    }

    /**
     * 初始化Database
     *
     * @param Dispathcher $dispatcher
     * @return void
     */
    public function _initDatabase(Dispatcher $dispatcher)
    {
        Database::initialization();
    }

    /**
     * 初始化
     *
     * @param Dispatcher $dispatcher
     * @return void
     */
    public function _init(Dispatcher $dispatcher)
    {   
        // 默认显示
        $dispatcher->setDefaultController("Index")->setDefaultAction("index");
        // 关掉view渲染
        $dispatcher->disableView();
    }

    /**
     * 注入扩展
     *
     * @param Dispatcher $dispatcher
     * @return void
     */
    public function _initPlugin(Dispatcher $dispatcher)
    {
        // 注入Json
        $dispatcher->registerPlugin(new JsonResponsePlugin);
        // 注入Response插件
        $dispatcher->registerPlugin(new ResponsePlugin);
    }
}

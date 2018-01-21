<?php

/*
 * 入口文件:
 * 定义常量
 * 加载函数库
 * 加载核心类
 * 运行框架
 */

 //定义常量 
define('COER', realpath('./'));  //项目根目录
define('CORE', COER.'/core');  //框架核心目录
define('APP', COER.'/app');  //框架应用目录
define('DEBUG', true);  //调试

//引入 composer 自动加载类文件
include 'vendor/autoload.php';

//开启 debug
if (DEBUG) {
    //使用 composer 类库 whoops: 出错提示信息
    $whoops = new \Whoops\Run();
    $whoops -> pushHandler(new \Whoops\Handler\PrettyPageHandler());
    //注册 whoops
    $whoops -> register();
	ini_set('display_errors', 'On');
} else {
	ini_set('display_errors', 'Off');
}

//加载函数库
include CORE.'/common/function.php';
//加载核心类
include CORE.'/coer.php';
//自动加载类
spl_autoload_register('\core\coer::load');  //方法名后不能加()
//运行框架
\core\coer::run();
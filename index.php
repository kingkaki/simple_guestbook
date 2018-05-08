<?php

/*
定义常量
加载函数库
启动框架
*/ 

define('MYPRO',realpath("./"));
define('CORE',MYPRO.'/core');
define('APP',MYPRO.'/app');
define('MODULE','app');
define('DEBUG',true);


if(DEBUG){
    ini_set('display_error','On');
}else{
    ini_set('display_error','Off');
}


include CORE.'/common/function.php';

include CORE.'/mypro.php';

spl_autoload_register('\core\mypro::load');  //自动加载类，当类不存在时，调用此方法

\core\mypro::run();
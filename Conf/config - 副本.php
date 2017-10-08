<?php

return array(
    //'配置项'=>'配置值'
    'default_module' => 'Index', //默认模块
    'url_model' => '1', //URL模式
    'session_auto_start' => true, //是否开启session    
    'URL_HTML_SUFFIX' => 'html|shmtl|xml', // 多个用 | 分割
    'URL_CASE_INSENSITIVE' => true, //URL大小写部分
    'DEFAULT_FILTER' => 'htmlspecialchars,strip_tags', //过滤
    'VAR_URL_PARAMS' => '_URL_', // PATHINFO URL参数变量
//'COOKIE_EXPIRE'=>30000000000,                // Cookie有效期
//'COOKIE_DOMAIN'=>$_SERVER['HTTP_HOST'],        // Cookie有效域名
//'COOKIE_PATH'=>'/',                        // Cookie路径
//'COOKIE_PREFIX'=>'think_',           // Cookie前缀 避免冲突    

    'DB_FIELDS_CACHE' => false, //数据库字段缓存
    'DB_TYPE' => 'mysql', // 数据库类型
    'DB_HOST' => 'localhost', // 服务器地址
    'DB_NAME' => 'erpgyd', // 数据库名
    'DB_USER' => 'gyd_erp', // 用户名
    'DB_PWD' => 'fjsdl234jkfl', // 密码
    'DB_PORT' => 3306, // 端口
    'DB_PREFIX' => 'sdb_', // 数据库表前缀 

    'URL_MODEL' => 1,
    'URL_PATHINFO_DEPR' => '/',
//    'URL_ROUTER_ON'   => true, //开启路由
//    'URL_ROUTE_RULES' => array( //定义路由规则
//    'news/:year/:month/:day' => array('News/archive', 'status=1'),
//    'news/:id'               => 'News/read',
//    'news/read/:id'          => '/news/:1',
//    ),
);
?>
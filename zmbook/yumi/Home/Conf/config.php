<?php
return array(
	'DB_TYPE' => 'mysql', // 数据库类型 
	'DB_HOST' => 'localhost', // 服务器地址 
	'DB_NAME' => 'yumipeng', // 数据库名 
	'DB_USER' => 'root', // 用户名 
	'DB_PWD' => '', // 密码 
	'DB_PORT' => 3306, // 端口 
	'DB_PREFIX' => 'yumi_', // 数据库表前缀  
	'DB_CHARSET'=> 'utf8', // 字符集 
	'DB_DEBUG' => TRUE, // 数据库调试模式

	'TMPL_PARSE_STRING' => array(
        '__ADMIN__' => '/zmbook/Public/Admin',
        '__HOME__' => '/zmbook/Public/Home',
        ),//'配置项'=>'配置值'
);
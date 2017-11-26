<?php
return array(
	//'配置项'=>'配置值'
   'SESSION_OPTIONS'         =>  array(
        // 'type'=>'Db',
        'name'                =>  'SESSION',                    //设置session名
        'expire'              =>  18000,                            //SESSION保存1h
        'use_trans_sid'       =>  1,                               //跨页传递
        'use_only_cookies'    =>  0,                               //是否只开启基于cookies的session的会话方式
    ),
	// 'THINK_EMAIL' => array(

	// 	'SMTP_HOST' => 'smtp.qq.com', //SMTP服务器
		
	// 	'SMTP_PORT' => '465', //SMTP服务器端口



	// 	'SMTP_USER' => '2770631412@qq.com', //SMTP服务器用户名

	// 	'SMTP_PASS' => 'huanongyumi.123', //SMTP服务器密码

	// 	'FROM_EMAIL' => '2770631412@qq.com',
		
	// 	'FROM_NAME' => '华农玉米温棚', //发件人名称

	// 	'REPLY_EMAIL' => '', //回复EMAIL（留空则为发件人EMAIL）

	// 	'REPLY_NAME' => '', //回复名称（留空则为发件人名称）

	// 	'SESSION_EXPIRE'=>'72',
	// ),
// 	'THINK_EMAIL' => array(
//     'SMTP_HOST'   => 'smtp.qq.com', //SMTP服务器
//     'SMTP_PORT'   => '465', //SMTP服务器端口
//     'SMTP_USER'   => '2770631412@qq.com', //SMTP服务器用户名
//     'SMTP_PASS'   => 'huanongyumi.123', //SMTP服务器密码
//     'FROM_EMAIL'  => '2770631412@qq.com', //发件人EMAIL
//     'FROM_NAME'   => '华农玉米温棚', //发件人名称
//     'REPLY_EMAIL' => '', //回复EMAIL（留空则为发件人EMAIL）
//     'REPLY_NAME'  => '', //回复名称（留空则为发件人名称）
// ),
);

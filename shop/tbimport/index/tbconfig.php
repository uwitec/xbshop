<?php

$tbconfig =array();
$tbconfig['web_root'] = '../../../data/upload/shop/store/goods/';//上传图片的存放位置。默认存放在/data/upload/shop/store/goods/ 目录下，如果你未更改，则此处无需修改。默认存放位置在 /global.php文件中定义，由define('DIR_UPLOAD','data/upload'); define('ATTACH_GOODS','shop/store/goods');共同决定。
	//如果你修改了默认存放位置，此处需要相应作出修改。
$tbconfig['datahost']     = 'localhost:3306';//数据库服务器地址和端口
$tbconfig['datausername'] = 'root';//数据库用户名
$tbconfig['datauserpass'] = 'root';//数据库用户密码
$tbconfig['databasename'] = 'shop';//使用的数据库名
$tbconfig['datatablepre'] = 'shop_'; //数据表前缀
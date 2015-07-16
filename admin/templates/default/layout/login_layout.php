<?php defined('InSchoolAssistant') or exit('Access Invalid!');?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET;?>">
<title><?php echo $output['html_title'];?></title>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/common.js"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.tscookie.js"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.validation.min.js"></script>
<link href="<?php echo ADMIN_TEMPLATES_URL;?>/css/login.css" rel="stylesheet" type="text/css">
<style type="text/css">
body {
	background-color: #666666;
	background-image: url("");
	background-repeat: no-repeat;
	background-position: center top;
	background-attachment: fixed;
	background-clip: border-box;
	background-size: cover;
	background-origin: padding-box;
	width: 100%;
	padding: 0;
}
</style>
</head>
<body>
<?php 
require_once($tpl_file);
?>
<script type="text/javascript">
$(document).ready(function(){
    //Random background image
    var random_bg=Math.floor(Math.random()*5+1);
    var bg='url(<?php echo ADMIN_TEMPLATES_URL;?>/images/login/bg_'+random_bg+'.jpg)';
    $("body").css("background-image",bg);
    //Hide Show verification code
    $("#hide").click(function(){
        $(".code").fadeOut("slow");
    });
    $("#captcha").focus(function(){
        $(".code").fadeIn("fast");
    });
    //跳出框架在主窗口登录
   if(top.location!=this.location)	top.location=this.location;
    $('#user_name').focus();
    if ($.browser.msie && $.browser.version=="6.0"){
        window.location.href='<?php echo ADMIN_TEMPLATES_URL;?>/ie6update.html';
    }
    $("#captcha").nc_placeholder();
});
</script>
</body>
</html>

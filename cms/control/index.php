<?php
/**
 * cms首页
 *
 *
 **by 校帮  运营版*/

defined('InSchoolAssistant') or exit('Access Invalid!');
class indexControl extends CMSHomeControl{

	public function __construct() {
		parent::__construct();
        Tpl::output('index_sign','index');
    }
	public function indexOp(){
        Tpl::showpage('index');
	}
}

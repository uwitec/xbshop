<?php
/**
 * 邀请返利页面
 * by 校帮 ww w.33 ha o.c om 
 */
defined('InSchoolAssistant') or exit('Access Invalid!');
class inviteControl extends BaseHomeControl{
	public function indexOp(){
		Tpl::showpage('invite');
	}
}

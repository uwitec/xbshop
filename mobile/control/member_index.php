<?php
/**
 * 我的商城
 *
 *
 *
 *
 * by  校帮 运营版
 */

use SchoolAssistant\Tpl;

defined('InSchoolAssistant') or exit('Access Invalid!');

class member_indexControl extends mobileMemberControl {

	public function __construct(){
		parent::__construct();
	}

    /**
     * 我的商城
     */
	public function indexOp() {
        $member_info = array();
        $member_info['user_name'] = $this->member_info['member_name'];
        $member_info['avator'] = getMemberAvatarForID($this->member_info['member_id']);
        $member_info['point'] = $this->member_info['member_points'];
        $member_info['predepoit'] = $this->member_info['available_predeposit'];

        output_data(array('member_info' => $member_info));
	}

}

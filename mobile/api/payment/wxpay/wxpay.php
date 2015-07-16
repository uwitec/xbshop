<?php
/**
 * 微信支付接口类
 *
 * 
 * by  校帮 运营版
 */
defined('InSchoolAssistant') or exit('Access Invalid!');

class wxpay{

    public function __construct() {
    }

    /**
     * 获取notify信息
     */
    public function getNotifyInfo($payment_config) {
        $verify = $this->_verify('notify', $payment_config);

        if($verify) {
            return array(
                //商户订单号
                'out_trade_no' => $_GET['out_trade_no'],
                //支付宝交易号
                'trade_no' => $_GET['transaction_id'],
            );
        }

        return false;
    }

    /**
     * 验证返回信息
     */
    private function _verify($payment_config) {
        if(empty($payment_config)) {
            return false;
        }

        //将系统的控制参数置空，防止因为加密验证出错
        unset($_GET['act']);
        unset($_GET['op']);
        unset($_GET['payment_code']);	

        ksort($_GET);
        $hash_temp = '';
        foreach ($_GET as $key => $value) {
            if($key != 'sign') {
                $hash_temp .= $key . '=' . $value . '&';
            }
        }

        $s .= 'key' . '=' . $payment_config['wxpay_key'];

        $hash = strtoupper(md5($s));

        return $hash == $_GET['sign'];
    }
}

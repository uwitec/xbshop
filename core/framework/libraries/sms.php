<?php
/**
 * 手机短信类
 *
 *
 *
 * @package    library* 校帮为你提供售后服务 以便你更好的了解
 */
defined('InSchoolAssistant') or exit('Access Invalid!');

class Sms {
    /**
     * 发送手机短信
     * @param unknown $mobile 手机号
     * @param unknown $content 短信内容
     */
    public function send($mobile,$content) {
        return $this->_sendEmay($mobile,$content);
    }

    /**
     * 亿美短信发送接口
     * @param unknown $mobile 手机号
     * @param unknown $content 短信内容
     */
    private function _sendEmay($mobile,$content) {
        set_time_limit(0);
        define('SCRIPT_ROOT',  BASE_DATA_PATH.'/api/emay/');
        require_once SCRIPT_ROOT.'include/Client.php';
        /**
         * 网关地址
         */
        $gwUrl = C('sms.gwUrl');
        /**
         * 序列号,请通过亿美销售人员获取
         */
        $serialNumber = C('sms.serialNumber');
        /**
         * 密码,请通过亿美销售人员获取
         */
        $password = C('sms.password');
        /**
         * 登录后所持有的SESSION KEY，即可通过login方法时创建
         */
        $sessionKey = C('sms.sessionKey');
        /**
         * 连接超时时间，单位为秒
         */
        $connectTimeOut = 2;
        /**
         * 远程信息读取超时时间，单位为秒
         */
        $readTimeOut = 10;
        /**
         $proxyhost		可选，代理服务器地址，默认为 false ,则不使用代理服务器
         $proxyport		可选，代理服务器端口，默认为 false
         $proxyusername	可选，代理服务器用户名，默认为 false
         $proxypassword	可选，代理服务器密码，默认为 false
         */
        $proxyhost = false;
        $proxyport = false;
        $proxyusername = false;
        $proxypassword = false;

        $client = new Client($gwUrl,$serialNumber,$password,$sessionKey,$proxyhost,$proxyport,$proxyusername,$proxypassword,$connectTimeOut,$readTimeOut);
        /**
         * 发送向服务端的编码，如果本页面的编码为GBK，请使用GBK
        */
        $client->setOutgoingEncoding("UTF-8");
        $statusCode = $client->login();
        if ($statusCode!=null && $statusCode=="0") {
        } else {
            //登录失败处理
        //    echo "登录失败,返回:".$statusCode;exit;
        }
        $statusCode = $client->sendSMS(array($mobile),$content);
        if ($statusCode!=null && $statusCode=="0") {
            return true;
        } else {
            return false;
             print_R($statusCode);
             echo "处理状态码:".$statusCode;
        }
    }
}

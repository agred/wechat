<?php

namespace Request\Third;

use Request\Kernel\ApiThird;

/**
 * 小程序成员管理
 * Class Oauth
 * @package Request
 */
class Tester extends ApiThird
{
    /**
     * @title 绑定微信用户为体验者
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/Mini_Program_AdminManagement/Admin.html
     * @param $access_token
     * @param $wechatid
     * @return bool|mixed|string
     */
    public function bind_tester($access_token, $wechatid)
    {
        $api_url = self::API_APP . '/wxa/bind_tester';
        $params  = [
            'access_token' => $access_token,
        ];
        $data    = [
            'wechatid' => $wechatid,
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 解除绑定体验者
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/Mini_Program_AdminManagement/unbind_tester.html
     * @param $access_token
     * @param $wechatid
     * @param $userstr
     * @return bool|mixed|string
     */
    public function unbind_tester($access_token, $wechatid, $userstr)
    {
        $api_url = self::API_APP . '/wxa/unbind_tester';
        $params  = [
            'access_token' => $access_token,
        ];
        $data    = [];
        if ($wechatid) {
            $data['wechatid'] = $wechatid;
        }
        if ($userstr) {
            $data['userstr'] = $userstr;
        }
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 获取体验者列表
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/Mini_Program_AdminManagement/memberauth.html
     * @param $access_token
     * @param string $action
     * @return bool|string
     */
    public function get_member_auth($access_token, $action = 'get_experiencer')
    {
        $api_url = self::API_APP . '/wxa/memberauth';
        $params  = [
            'access_token' => $access_token,
        ];
        $data    = [
            'action' => $action,
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }
}

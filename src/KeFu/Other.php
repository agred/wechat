<?php

namespace KeFu;

use KeFu\Kernel\BaseApi;

/**
 * 其他信息
 * Class Other
 * @package KeFu
 */
class Other extends BaseApi
{

    /**
     * @title 获取客户基础信息
     * @Scope
     * @url https://open.work.weixin.qq.com/kf/doc/92512/93143/95166
     * @param string $access_token
     * @param string $external_userid_list
     */
    public function customer_batchget($access_token, $external_userid_list)
    {
        $api_url = self::OPEN_API . '/cgi-bin/kf/customer/batchget';
        $params = [
            'access_token' => $access_token
        ];
        $data = [
            'external_userid_list' => $external_userid_list
        ];
        return $this->https_post($api_url, $params, $data);
    }

    /**
     * @title 获取企业状态信息
     * @Scope
     * @url https://open.work.weixin.qq.com/kf/doc/92512/93143/95168
     * @param string $access_token
     */
    public function get_corp_qualification($access_token)
    {
        $api_url = self::OPEN_API . '/cgi-bin/kf/get_corp_qualification';
        $params = [
            'access_token' => $access_token
        ];
        return $this->https_get($api_url, $params);
    }

    /**
     * @title 获取企业验证状态
     * @Scope
     * @url https://open.work.weixin.qq.com/kf/doc/92512/93143/95168、https://work.weixin.qq.com/api/doc/90001/90143/90604
     * @param string $suite_access_token
     * @param string $auth_corpid
     * @param string $permanent_code
     */
    public function get_auth_info($suite_access_token, $auth_corpid, $permanent_code)
    {
        $api_url = self::OPEN_API . '/cgi-bin/service/get_auth_info';
        $params = [
            'suite_access_token' => $suite_access_token
        ];
        $data = [
            'auth_corpid' => $auth_corpid,
            'permanent_code' => $permanent_code
        ];
        return $this->https_post($api_url, $params, $data);
    }

}

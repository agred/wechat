<?php

namespace Request\KeFu;

use Request\Kernel\ApiKeFu;

/**
 * 调用凭证
 * Class Oauth
 * @package Request
 */
class Oauth extends ApiKeFu
{
    /**
     * @title 获取调用凭证access_token
     * @Scope
     * @url https://open.work.weixin.qq.com/kf/doc/92512/93143/93304
     */
    public function access_token()
    {
        $api_url = self::API_QY . '/cgi-bin/gettoken';
        return $this->https_get($api_url);
    }

    /**
     * @title 获取第三方应用凭证
     * @Scope
     * @url https://open.work.weixin.qq.com/api/doc/90001/90143/90600
     * @param $suite_id
     * @param $suite_secret
     * @param $suite_ticket
     * @return mixed
     */
    public function suite_access_token($suite_id, $suite_secret, $suite_ticket)
    {
        $api_url = self::API_QY . '/cgi-bin/service/get_suite_token';
        $params  = [];
        $data    = [
            'suite_id'     => $suite_id,
            'suite_secret' => $suite_secret,
            'suite_ticket' => $suite_ticket
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 获取预授权码
     * @Scope
     * @url https://open.work.weixin.qq.com/api/doc/90001/90143/90601
     * @param $suite_access_token
     * @return mixed
     */
    public function pre_auth_code($suite_access_token)
    {
        $api_url = self::API_QY . '/cgi-bin/service/get_pre_auth_code';
        $params  = [
            'suite_access_token' => $suite_access_token
        ];
        return $this->https_get($api_url, $params);
    }

    /**
     * @title 设置授权配置
     * @Scope
     * @url https://open.work.weixin.qq.com/api/doc/90001/90143/90602
     * @param $suite_access_token
     * @param $pre_auth_code
     * @param $appid
     * @param int $auth_type
     * @return mixed
     */
    public function set_session_info($suite_access_token, $pre_auth_code, $appid, $auth_type = 0)
    {
        $api_url = self::API_QY . '/cgi-bin/service/set_session_info';
        $params  = [
            'suite_access_token' => $suite_access_token
        ];
        $data    = [
            'pre_auth_code' => $pre_auth_code,
            'session_info'  => [
                'appid'     => $appid,
                'auth_type' => $auth_type
            ]
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 获取企业永久授权码
     * @Scope
     * @url https://open.work.weixin.qq.com/api/doc/90001/90143/90603
     * @param $suite_access_token
     * @param $auth_code
     * @return mixed
     */
    public function permanent_code($suite_access_token, $auth_code)
    {
        $api_url = self::API_QY . '/cgi-bin/service/get_permanent_code';
        $params  = [
            'suite_access_token' => $suite_access_token
        ];
        $data    = [
            'auth_code' => $auth_code
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 获取企业授权信息
     * @Scope
     * @url https://open.work.weixin.qq.com/api/doc/90001/90143/90604
     * @param $suite_access_token
     * @param $auth_corpid
     * @param $permanent_code
     * @return mixed
     */
    public function auth_info($suite_access_token, $auth_corpid, $permanent_code)
    {
        $api_url = self::API_QY . '/cgi-bin/service/get_auth_info';
        $params  = [
            'suite_access_token' => $suite_access_token
        ];
        $data    = [
            'auth_corpid'    => $auth_corpid,
            'permanent_code' => $permanent_code
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 获取企业凭证
     * @Scope
     * @url https://open.work.weixin.qq.com/api/doc/90001/90143/90605
     * @param $suite_access_token
     * @param $auth_corpid
     * @param $permanent_code
     * @return mixed
     */
    public function corp_token($suite_access_token, $auth_corpid, $permanent_code)
    {
        $api_url = self::API_QY . '/cgi-bin/service/get_corp_token';
        $params  = [
            'suite_access_token' => $suite_access_token
        ];
        $data    = [
            'auth_corpid'    => $auth_corpid,
            'permanent_code' => $permanent_code
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 获取应用的管理员列表
     * @Scope
     * @url https://open.work.weixin.qq.com/api/doc/90001/90143/90606
     * @param $suite_access_token
     * @param $auth_corpid
     * @param $agentid
     * @return mixed
     */
    public function admin_list($suite_access_token, $auth_corpid, $agentid)
    {
        $api_url = self::API_QY . '/cgi-bin/service/get_admin_list';
        $params  = [
            'suite_access_token' => $suite_access_token
        ];
        $data    = [
            'auth_corpid' => $auth_corpid,
            'agentid'     => $agentid
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }
}

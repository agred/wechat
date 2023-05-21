<?php

namespace Request\Third;

use Request\Kernel\ApiThird;

/**
 * 授权与Token
 * Class Oauth
 * @package Request
 */
class Oauth extends ApiThird
{
    /**
     * @title 启动 ticket 推送服务
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/ThirdParty/token/component_verify_ticket_service.html
     * @param $component_appid
     * @param $component_secret
     * @return mixed
     */
    public function api_start_push_ticket($component_appid, $component_secret)
    {
        $api_url = self::API_APP . '/cgi-bin/component/api_start_push_ticket';
        $data    = [
            'component_appid'  => $component_appid,
            'component_secret' => $component_secret,
        ];
        return $this->https_post($api_url, '', json_encode($data));
    }

    /**
     * @title 获取令牌
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/ThirdParty/token/component_access_token.html
     * @param $component_appid
     * @param $component_appsecret
     * @param $component_verify_ticket
     * @return mixed
     */
    public function api_component_token($component_appid, $component_appsecret, $component_verify_ticket)
    {
        $api_url = self::API_APP . '/cgi-bin/component/api_component_token';
        $data    = [
            'component_appid'         => $component_appid,
            'component_appsecret'     => $component_appsecret,
            'component_verify_ticket' => $component_verify_ticket,
        ];
        return $this->https_post($api_url, '', json_encode($data));
    }

    /**
     * @title 获取预授权码
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/ThirdParty/token/pre_auth_code.html
     * @param $component_access_token
     * @param $component_appid
     * @return mixed
     */
    public function api_create_preauthcode($component_access_token, $component_appid)
    {
        $api_url = self::API_APP . '/cgi-bin/component/api_create_preauthcode';
        $params  = [
            'component_access_token' => $component_access_token,
        ];
        $data    = [
            'component_appid' => $component_appid,
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 使用授权码获取授权信息
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/ThirdParty/token/authorization_info.html
     * @param $component_access_token
     * @param $component_appid
     * @param $authorization_code
     * @return mixed
     */
    public function api_query_auth($component_access_token, $component_appid, $authorization_code)
    {
        $api_url = self::API_APP . '/cgi-bin/component/api_query_auth';
        $params  = [
            'component_access_token' => $component_access_token,
        ];
        $data    = [
            'component_appid'    => $component_appid,
            'authorization_code' => $authorization_code,
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 获取/刷新接口调用令牌
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/ThirdParty/token/api_authorizer_token.html
     * @param $component_access_token
     * @param $component_appid
     * @param $authorizer_appid
     * @param $authorizer_refresh_token
     * @return mixed
     */
    public function api_authorizer_token($component_access_token, $component_appid, $authorizer_appid, $authorizer_refresh_token)
    {
        $api_url = self::API_APP . '/cgi-bin/component/api_authorizer_token';
        $params  = [
            'component_access_token' => $component_access_token,
        ];
        $data    = [
            'component_appid'          => $component_appid,
            'authorizer_appid'         => $authorizer_appid,
            'authorizer_refresh_token' => $authorizer_refresh_token,
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 获取授权帐号详情
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/ThirdParty/token/api_get_authorizer_info.html
     * @param $component_access_token
     * @param $component_appid
     * @param $authorizer_appid
     * @return mixed
     */
    public function api_get_authorizer_info($component_access_token, $component_appid, $authorizer_appid)
    {
        $api_url = self::API_APP . '/cgi-bin/component/api_get_authorizer_info';
        $params  = [
            'component_access_token' => $component_access_token,
        ];
        $data    = [
            'component_appid'  => $component_appid,
            'authorizer_appid' => $authorizer_appid,
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }
}

<?php

namespace Request\Third;

use Request\Kernel\ApiThird;

/**
 * 授权方账号管理
 * Class Oauth
 * @package Request
 */
class Authorizer extends ApiThird
{
    /**
     * @title 拉取所有已授权的帐号信息
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/ThirdParty/Account_Authorization/api_get_authorizer_list.html
     * @param $component_access_token
     * @param $component_appid
     * @param $offset
     * @param $count
     * @return mixed
     */
    public function api_get_authorizer_list($component_access_token, $component_appid, $offset = 0, $count = 100)
    {
        $api_url = self::API_APP . '/cgi-bin/component/api_get_authorizer_list';
        $params  = [
            'component_access_token' => $component_access_token,
        ];
        $data    = [
            'component_appid' => $component_appid,
            'offset'          => $offset,
            'count'           => $count,
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 获取授权方选项信息
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/ThirdParty/Account_Authorization/api_get_authorizer_option.html
     * @param $component_access_token
     * @param $component_appid
     * @param $authorizer_appid
     * @param $option_name
     * @return mixed
     */
    public function api_get_authorizer_option($component_access_token, $component_appid, $authorizer_appid, $option_name)
    {
        $api_url = self::API_APP . '/cgi-bin/component/api_get_authorizer_option';
        $params  = [
            'component_access_token' => $component_access_token,
        ];
        $data    = [
            'component_appid'  => $component_appid,
            'authorizer_appid' => $authorizer_appid,
            'option_name'      => $option_name,
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 设置授权方选项信息
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/ThirdParty/Account_Authorization/api_set_authorizer_option.html
     * @param $component_access_token
     * @param $component_appid
     * @param $authorizer_appid
     * @param $option_name
     * @param $option_value
     * @return mixed
     */
    public function api_set_authorizer_option($component_access_token, $component_appid, $authorizer_appid, $option_name, $option_value)
    {
        $api_url = self::API_APP . '/cgi-bin/component/api_set_authorizer_option';
        $params  = [
            'component_access_token' => $component_access_token,
        ];
        $data    = [
            'component_appid'  => $component_appid,
            'authorizer_appid' => $authorizer_appid,
            'option_name'      => $option_name,
            'option_value'     => $option_value,
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }
}

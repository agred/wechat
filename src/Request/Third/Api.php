<?php

namespace Request\Third;

use Request\Kernel\ApiThird;

/**
 * Api管理
 * Class Oauth
 * @package Request
 */
class Api extends ApiThird
{
    /**
     * @title 清空 api 的调用quota
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/openApi/clear_quota.html
     * @param $access_token
     * @param $appid
     * @return bool|mixed|string
     */
    public function clear_quota($access_token, $appid)
    {
        $api_url = self::API_APP . '/cgi-bin/clear_quota';
        $params  = [
            'access_token' => $access_token,
        ];
        $data    = [
            'appid' => $appid,
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 查询 openApi 调用quota
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/openApi/get_api_quota.html
     * @param $access_token
     * @param $cgi_path
     * @return bool|mixed|string
     */
    public function get_quota($access_token, $cgi_path)
    {
        $api_url = self::API_APP . '/openapi/quota/get';
        $params  = [
            'access_token' => $access_token,
        ];
        $data    = [
            'cgi_path' => $cgi_path,
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 查询 rid 信息
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/openApi/get_rid_info.html
     * @param $access_token
     * @param $rid
     * @return bool|mixed|string
     */
    public function get_rid($access_token, $rid)
    {
        $api_url = self::API_APP . '/cgi-bin/openapi/rid/get';
        $params  = [
            'access_token' => $access_token,
        ];
        $data    = [
            'rid' => $rid,
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }
}

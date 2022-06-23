<?php

namespace Request\Third;

use Request\Kernel\ApiThird;

/**
 * 开放平台账号管理
 * Class Oauth
 * @package Request
 */
class Open extends ApiThird
{
    /**
     * @title 创建开放平台帐号并绑定公众号/小程序
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/account/create.html
     * @param $authorizer_access_token
     * @param $appid
     * @return mixed
     */
    public function create($authorizer_access_token, $appid)
    {
        $api_url = self::API_APP . '/cgi-bin/open/create';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        $data    = [];
        if ($appid) {
            $data['appid'] = $appid;
        }
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 将公众号/小程序绑定到开放平台帐号下
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/account/bind.html
     * @param $authorizer_access_token
     * @param $appid
     * @param $open_appid
     * @return mixed
     */
    public function bind($authorizer_access_token, $appid, $open_appid)
    {
        $api_url = self::API_APP . '/cgi-bin/open/bind';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        $data    = [
            'open_appid' => $open_appid,
        ];
        if ($appid) {
            $data['appid'] = $appid;
        }
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 将公众号/小程序从开放平台帐号下解绑
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/account/unbind.html
     * @param $authorizer_access_token
     * @param $appid
     * @param $open_appid
     * @return mixed
     */
    public function unbind($authorizer_access_token, $appid, $open_appid)
    {
        $api_url = self::API_APP . '/cgi-bin/open/unbind';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        $data    = [
            'open_appid' => $open_appid,
        ];
        if ($appid) {
            $data['appid'] = $appid;
        }
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 获取公众号/小程序所绑定的开放平台帐号
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/account/get.html
     * @param $authorizer_access_token
     * @param $appid
     * @return mixed
     */
    public function get($authorizer_access_token, $appid)
    {
        $api_url = self::API_APP . '/cgi-bin/open/get';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        $data    = [];
        if ($appid) {
            $data['appid'] = $appid;
        }
        return $this->https_post($api_url, $params, json_encode($data));
    }
}

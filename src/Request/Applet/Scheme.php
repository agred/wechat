<?php

namespace Request\Applet;

use Request\Kernel\ApiApplet;

/**
 * URL Scheme
 * Class Scheme
 * @package Request
 */
class Scheme extends ApiApplet
{
    /**
     * @title 获取小程序 scheme 码，适用于短信、邮件、外部网页、微信内等拉起小程序的业务场景。目前仅针对国内非个人主体的小程序开放
     * @Scope
     * @url https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/url-scheme/urlscheme.generate.html
     * @param string $access_token
     * @param string $jump_wxa
     */
    public function generate($access_token, $jump_wxa)
    {
        $api_url = self::API_APP . '/wxa/generatescheme';
        $params  = [
            'access_token' => $access_token
        ];
        $data    = [
            'jump_wxa' => $jump_wxa
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 查询小程序 scheme 码
     * @Scope
     * @url https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/url-scheme/urlscheme.query.html
     * @param string $access_token
     * @param string $scheme
     */
    public function query($access_token, $scheme)
    {
        $api_url = self::API_APP . '/wxa/queryscheme';
        $params  = [
            'access_token' => $access_token
        ];
        $data    = [
            'scheme' => $scheme
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }
}

<?php

namespace Request\Applet;

use Request\Kernel\ApiApplet;

/**
 * URL Link
 * Class Link
 * @package Request
 */
class Link extends ApiApplet
{
    /**
     * @title 获取小程序 URL Link，适用于短信、邮件、网页、微信内等拉起小程序的业务场景。目前仅针对国内非个人主体的小程序开放
     * @Scope
     * @url https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/url-link/urllink.generate.html
     * @param string $access_token
     * @param string $path
     */
    public function generate($access_token, $path)
    {
        $api_url = self::APP_API . '/wxa/generate_urllink';
        $params = [
            'access_token' => $access_token
        ];
        $data = [
            'path' => $path
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 查询小程序 url_link 配置
     * @Scope
     * @url https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/url-scheme/urlscheme.query.html
     * @param string $access_token
     * @param string $url_link
     */
    public function query($access_token, $url_link)
    {
        $api_url = self::APP_API . '/wxa/query_urllink';
        $params = [
            'access_token' => $access_token
        ];
        $data = [
            'url_link' => $url_link
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 查询小程序 url_link 配置
     * @Scope
     * @url https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/short-link/shortlink.generate.html
     * @param string $access_token
     * @param string $page_url
     * @param string $page_title
     * @param bool $is_permanent
     */
    public function getShortLink($access_token, $page_url, $page_title, $is_permanent = false)
    {
        $api_url = self::APP_API . '/wxa/genwxashortlink';
        $params = [
            'access_token' => $access_token
        ];
        $data = [
            'page_url' => $page_url,
            'page_title' => $page_title,
            'is_permanent' => $is_permanent
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }
}

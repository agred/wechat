<?php

namespace Request\Applet;

use Request\Kernel\ApiApplet;

/**
 * NFC URL Scheme
 * Class Qr
 * @package Request
 */
class Nfc extends ApiApplet
{
    /**
     * @title 获取 NFC 的小程序 scheme
     * @Scope
     * @url https://developers.weixin.qq.com/miniprogram/dev/OpenApiDoc/qrcode-link/url-scheme/generateNFCScheme.html
     * @param string $access_token
     * @param array $data
     */
    public function generateNfcScheme($access_token, $data = [])
    {
        $api_url = self::API_APP . '/wxa/generatenfcscheme';
        $params  = [
            'access_token' => $access_token
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 获取加密scheme码
     * @Scope
     * @url https://developers.weixin.qq.com/miniprogram/dev/OpenApiDoc/qrcode-link/url-scheme/generateScheme.html
     * @param string $access_token
     * @param array $data
     */
    public function generateScheme($access_token, $data = [])
    {
        $api_url = self::API_APP . '/wxa/generatescheme';
        $params  = [
            'access_token' => $access_token
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 查询scheme码
     * @Scope
     * @url https://developers.weixin.qq.com/miniprogram/dev/OpenApiDoc/qrcode-link/url-scheme/queryScheme.html
     * @param string $access_token
     * @param array $data
     */
    public function queryScheme($access_token, $data= [])
    {
        $api_url = self::API_APP . '/wxa/queryscheme';
        $params  = [
            'access_token' => $access_token
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }
}

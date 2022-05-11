<?php

namespace Request\Applet;

use Request\Kernel\ApiApplet;

/**
 * 小程序码
 * Class Qr
 * @package Request
 */
class Qr extends ApiApplet
{
    /**
     * @title 获取小程序二维码，适用于需要的码数量较少的业务场景。通过该接口生成的小程序码，永久有效，有数量限制
     * @Scope
     * @url https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/qr-code/wxacode.createQRCode.html
     * @param string $access_token
     * @param string $path
     */
    public function createQRCode($access_token, $path)
    {
        $api_url = self::API_APP . '/cgi-bin/wxaapp/createwxaqrcode';
        $params  = [
            'access_token' => $access_token
        ];
        $data    = [
            'path' => $path
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 获取小程序码，适用于需要的码数量较少的业务场景。通过该接口生成的小程序码，永久有效，有数量限制
     * @Scope
     * @url https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/qr-code/wxacode.get.html
     * @param string $access_token
     * @param string $path
     */
    public function get($access_token, $path)
    {
        $api_url = self::API_APP . '/wxa/getwxacode';
        $params  = [
            'access_token' => $access_token
        ];
        $data    = [
            'path' => $path
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 获取小程序码，适用于需要的码数量极多的业务场景。通过该接口生成的小程序码，永久有效，数量暂无限制
     * @Scope
     * @url https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/qr-code/wxacode.getUnlimited.html
     * @param string $access_token
     * @param string $scene
     */
    public function getUnlimited($access_token, $scene)
    {
        $api_url = self::API_APP . '/wxa/getwxacodeunlimit';
        $params  = [
            'access_token' => $access_token
        ];
        $data    = [
            'scene' => $scene
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }
}

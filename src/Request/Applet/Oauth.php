<?php

namespace Request\Applet;

use Request\Kernel\ApiApplet;

/**
 * 调用凭证
 * Class Oauth
 * @package Request
 */
class Oauth extends ApiApplet
{
    /**
     * @title 登录凭证校验。通过 wx.login 接口获得临时登录凭证 code 后传到开发者服务器调用此接口完成登录流程。
     * @Scope
     * @url https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/login/auth.code2Session.html
     * @param string $code
     */
    public function code2Session($code)
    {
        $api_url = self::APP_API . '/sns/jscode2session';
        $params = [
            'js_code' => $code,
            'grant_type' => 'authorization_code',
        ];
        return $this->https_get($api_url, $params);
    }

    /**
     * @title 获取小程序全局唯一后台接口调用凭据（access_token）
     * @Scope
     * @url https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/access-token/auth.getAccessToken.html
     */
    public function getAccessToken()
    {
        $api_url = self::APP_API . '/cgi-bin/token';
        $params = [
            'grant_type' => 'client_credential',
        ];
        return $this->https_get($api_url, $params);
    }

    /**
     * @title 获取硬件设备票据，5 分钟内有效
     * @Scope
     * @url https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/hardware-device/hardwareDevice.getSnTicket.html
     * @param string $access_token
     * @param string $sn
     * @param string $model_id
     */
    public function getSnTicket($access_token, $sn, $model_id)
    {
        $api_url = self::APP_API . '/wxa/getsnticket';
        $params = [
            'access_token' => $access_token
        ];
        $data = [
            'sn' => $sn,
            'model_id' => $model_id
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title SOTER 生物认证秘钥签名验证
     * @Scope
     * @url https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/soter/soter.verifySignature.html
     * @param string $access_token
     * @param string $openid
     * @param string $json_string
     * @param string $json_signature
     */
    public function verifySignature($access_token, $openid, $json_string, $json_signature)
    {
        $api_url = self::APP_API . '/cgi-bin/soter/verify_signature';
        $params = [
            'access_token' => $access_token
        ];
        $data = [
            'openid' => $openid,
            'json_string' => $json_string,
            'json_signature' => $json_string
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }
}

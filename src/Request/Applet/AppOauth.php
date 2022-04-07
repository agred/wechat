<?php

namespace Request\Applet;

use Request\Kernel\AppApi;

/**
 * 调用凭证
 * Class AppOauth
 * @package Request
 */
class AppOauth extends AppApi
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
}

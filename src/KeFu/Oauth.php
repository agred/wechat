<?php

namespace KeFu;

use KeFu\Kernel\BaseApi;

/**
 * 调用凭证
 * Class Oauth
 * @package KeFu
 */
class Oauth extends BaseApi
{

    /**
     * @title 获取调用凭证access_token
     * @Scope
     * @url https://open.work.weixin.qq.com/kf/doc/92512/93143/93304
     */
    public function access_token()
    {
        $api_url = self::OPEN_API . '/cgi-bin/gettoken/';
        return $this->https_get($api_url);
    }

}

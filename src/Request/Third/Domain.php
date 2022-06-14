<?php

namespace Request\Third;

use Request\Kernel\ApiThird;

/**
 * 域名管理
 * Class Oauth
 * @package Request
 */
class Domain extends ApiThird
{
    /**
     * @title 设置第三方平台服务器域名
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/ThirdParty/domain/modify_server_domain.html
     * @param $access_token
     * @param $action
     * @param $is_modify_published_together
     * @param $wxa_server_domain
     * @return bool|mixed|string
     */
    public function modify_wxa_server_domain($access_token, $action, $is_modify_published_together, $wxa_server_domain)
    {
        $api_url = self::API_APP . '/cgi-bin/component/modify_wxa_server_domain';
        $params  = [
            'access_token' => $access_token,
        ];
        $data    = [
            'action' => $action,
        ];
        if ($is_modify_published_together) {
            $data['is_modify_published_together'] = $is_modify_published_together;
        }
        if ($wxa_server_domain) {
            $data['wxa_server_domain'] = $wxa_server_domain;
        }
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 获取第三方业务域名的校验文件
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/ThirdParty/domain/get_domain_confirmfile.html
     * @param $access_token
     * @return bool|mixed|string
     */
    public function get_domain_confirmfile($access_token)
    {
        $api_url = self::API_APP . '/cgi-bin/component/get_domain_confirmfile';
        $params  = [
            'access_token' => $access_token,
        ];
        return $this->https_post($api_url, $params);
    }

    /**
     * @title 设置第三方平台业务域名
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/ThirdParty/domain/modify_jump_domain.html
     * @param $access_token
     * @param $action
     * @param $is_modify_published_together
     * @param $wxa_jump_h5_domain
     * @return bool|mixed|string
     */
    public function modify_wxa_jump_domain($access_token, $action, $is_modify_published_together, $wxa_jump_h5_domain)
    {
        $api_url = self::API_APP . '/cgi-bin/component/modify_wxa_jump_domain';
        $params  = [
            'access_token' => $access_token,
        ];
        $data    = [
            'action' => $action,
        ];
        if ($is_modify_published_together) {
            $data['is_modify_published_together'] = $is_modify_published_together;
        }
        if ($wxa_jump_h5_domain) {
            $data['wxa_jump_h5_domain'] = $wxa_jump_h5_domain;
        }
        return $this->https_post($api_url, $params, json_encode($data));
    }
}

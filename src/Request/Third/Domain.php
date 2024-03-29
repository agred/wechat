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
     * @param $component_access_token
     * @param $action
     * @param $wxa_server_domain
     * @param $is_modify_published_together
     * @return mixed
     */
    public function modify_wxa_server_domain($component_access_token, $action, $wxa_server_domain = '', $is_modify_published_together = false)
    {
        $api_url = self::API_APP . '/cgi-bin/component/modify_wxa_server_domain';
        $params  = [
            'access_token' => $component_access_token,
        ];
        $data    = [
            'action' => $action,
        ];
        if ($wxa_server_domain) {
            $data['wxa_server_domain'] = $wxa_server_domain;
        }
        if ($is_modify_published_together) {
            $data['is_modify_published_together'] = $is_modify_published_together;
        }
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 获取第三方业务域名的校验文件
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/ThirdParty/domain/get_domain_confirmfile.html
     * @param $component_access_token
     * @return mixed
     */
    public function get_domain_confirmfile($component_access_token)
    {
        $api_url = self::API_APP . '/cgi-bin/component/get_domain_confirmfile';
        $params  = [
            'access_token' => $component_access_token,
        ];
        return $this->https_post($api_url, $params);
    }

    /**
     * @title 设置第三方平台业务域名
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/ThirdParty/domain/modify_jump_domain.html
     * @param $component_access_token
     * @param $action
     * @param $wxa_jump_h5_domain
     * @param $is_modify_published_together
     * @return mixed
     */
    public function modify_wxa_jump_domain($component_access_token, $action, $wxa_jump_h5_domain = '', $is_modify_published_together = false)
    {
        $api_url = self::API_APP . '/cgi-bin/component/modify_wxa_jump_domain';
        $params  = [
            'access_token' => $component_access_token,
        ];
        $data    = [
            'action' => $action,
        ];
        if ($wxa_jump_h5_domain) {
            $data['wxa_jump_h5_domain'] = $wxa_jump_h5_domain;
        }
        if ($is_modify_published_together) {
            $data['is_modify_published_together'] = $is_modify_published_together;
        }
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 小程序设置服务器域名
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/Mini_Program_Basic_Info/Server_Address_Configuration.html
     * @param $authorizer_access_token
     * @param $action
     * @param $requestdomain
     * @param $wsrequestdomain
     * @param $uploaddomain
     * @param $downloaddomain
     * @param $udpdomain
     * @param $tcpdomain
     * @return mixed
     */
    public function modify_domain($authorizer_access_token, $action = 'get',
                                  $requestdomain = null, $wsrequestdomain = null,
                                  $uploaddomain = null, $downloaddomain = null,
                                  $udpdomain = null, $tcpdomain = null)
    {
        $api_url = self::API_APP . '/wxa/modify_domain';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        if ($action == 'get') {
            $data = [
                'action' => $action,
            ];
        } else {
            $data = [
                'action'          => $action,
                'requestdomain'   => $requestdomain,
                'wsrequestdomain' => $wsrequestdomain,
                'uploaddomain'    => $uploaddomain,
                'downloaddomain'  => $downloaddomain,
                'udpdomain'       => $udpdomain,
                'tcpdomain'       => $tcpdomain,
            ];
        }
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 小程序设置业务域名
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/Mini_Program_Basic_Info/setwebviewdomain.html
     * @param $authorizer_access_token
     * @param $action
     * @param $webviewdomain
     * @return mixed
     */
    public function set_webview_domain($authorizer_access_token, $action, $webviewdomain = null)
    {
        $api_url = self::API_APP . '/wxa/setwebviewdomain';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        if ($action == 'get') {
            $data = [
                'action' => $action,
            ];
        } else {
            $data = [
                'action'        => $action,
                'webviewdomain' => $webviewdomain,
            ];
        }
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 快速设置小程序服务器域名
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/Mini_Program_Basic_Info/Server_Address_Configuration.html
     * @param $authorizer_access_token
     * @param $action
     * @param $requestdomain
     * @param $wsrequestdomain
     * @param $uploaddomain
     * @param $downloaddomain
     * @param $udpdomain
     * @param $tcpdomain
     * @return mixed
     */
    public function modify_domain_directly($authorizer_access_token, $action = 'get',
                                           $requestdomain = null, $wsrequestdomain = null,
                                           $uploaddomain = null, $downloaddomain = null,
                                           $udpdomain = null, $tcpdomain = null)
    {
        $api_url = self::API_APP . '/wxa/modify_domain_directly';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        if ($action == 'get') {
            $data = [
                'action' => $action,
            ];
        } else {
            $data = [
                'action'          => $action,
                'requestdomain'   => $requestdomain,
                'wsrequestdomain' => $wsrequestdomain,
                'uploaddomain'    => $uploaddomain,
                'downloaddomain'  => $downloaddomain,
                'udpdomain'       => $udpdomain,
                'tcpdomain'       => $tcpdomain,
            ];
        }
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 快速设置小程序业务域名
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/Mini_Program_Basic_Info/setwebviewdomain_directly.html
     * @param $authorizer_access_token
     * @param $action
     * @param $webviewdomain
     * @return mixed
     */
    public function set_webview_domain_directly($authorizer_access_token, $action = 'get', $webviewdomain = null)
    {
        $api_url = self::API_APP . '/wxa/setwebviewdomain_directly';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        if ($action == 'get') {
            $data = [
                'action' => $action,
            ];
        } else {
            $data = [
                'action'        => $action,
                'webviewdomain' => $webviewdomain,
            ];
        }
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 获取发布后生效业务域名列表
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/openApi/OpenApiDoc/miniprogram-management/domain-management/getEffectiveJumpDomain.html
     * @param $authorizer_access_token
     * @return mixed
     */
    public function get_effective_webviewdomain($authorizer_access_token)
    {
        $api_url = self::API_APP . '/wxa/get_effective_webviewdomain';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        return $this->https_post($api_url, $params);
    }

    /**
     * @title 获取发布后生效服务器域名列表
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/openApi/OpenApiDoc/miniprogram-management/domain-management/getEffectiveServerDomain.html
     * @param $authorizer_access_token
     * @return mixed
     */
    public function get_effective_domain($authorizer_access_token)
    {
        $api_url = self::API_APP . '/wxa/get_effective_domain';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        return $this->https_post($api_url, $params);
    }

    /**
     * @title 获取业务域名校验文件
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/Mini_Program_Basic_Info/get_domain_confirmfile.html
     * @param $authorizer_access_token
     * @return mixed
     */
    public function get_webviewdomain_confirmfile($authorizer_access_token)
    {
        $api_url = self::API_APP . '/wxa/get_webviewdomain_confirmfile';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        return $this->https_post($api_url, $params);
    }
}

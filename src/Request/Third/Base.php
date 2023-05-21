<?php

namespace Request\Third;

use Request\Kernel\ApiThird;

/**
 * Base管理
 * Class Oauth
 * @package Request
 */
class Base extends ApiThird
{
    /**
     * @title 获取小程序基本信息
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/Mini_Program_Basic_Info/Mini_Program_Information_Settings.html
     * @param $authorizer_access_token
     * @return mixed
     */
    public function get_account_basic_info($authorizer_access_token)
    {
        $api_url = self::API_APP . '/cgi-bin/account/getaccountbasicinfo';
        $params = [
            'access_token' => $authorizer_access_token,
        ];
        return $this->https_get($api_url, $params);
    }

    /**
     * @title 查询绑定的开放平台帐号
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/openApi/OpenApiDoc/miniprogram-management/basic-info-management/getBindOpenAccount.html
     * @param $authorizer_access_token
     * @return mixed
     */
    public function get_bind_open_account($authorizer_access_token)
    {
        $api_url = self::API_APP . '/cgi-bin/open/have';
        $params = [
            'access_token' => $authorizer_access_token,
        ];
        return $this->https_get($api_url, $params);
    }

    /**
     * @title 小程序名称检测
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/openApi/OpenApiDoc/miniprogram-management/basic-info-management/checkNickName.html
     * @param $authorizer_access_token
     * @param $nick_name
     * @return mixed
     */
    public function check_nickname($authorizer_access_token, $nick_name)
    {
        $api_url = self::API_APP . '/cgi-bin/wxverify/checkwxverifynickname';
        $params = [
            'access_token' => $authorizer_access_token,
        ];
        $data = [
            'nick_name' => $nick_name,
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 设置小程序名称
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/openApi/OpenApiDoc/miniprogram-management/basic-info-management/setNickName.html
     * @param $authorizer_access_token
     * @param $data
     * @return mixed
     */
    public function set_nickname($authorizer_access_token, $data = [])
    {
        $api_url = self::API_APP . '/wxa/setnickname';
        $params = [
            'access_token' => $authorizer_access_token,
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 查询小程序名称审核状态
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/openApi/OpenApiDoc/miniprogram-management/basic-info-management/getNickNameStatus.html
     * @param $authorizer_access_token
     * @param $audit_id
     * @return mixed
     */
    public function get_nickName_status($authorizer_access_token, $audit_id)
    {
        $api_url = self::API_APP . '/wxa/api_wxa_querynickname';
        $params = [
            'access_token' => $authorizer_access_token,
        ];
        $data = [
            'audit_id' => $audit_id,
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 设置小程序介绍
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/openApi/OpenApiDoc/miniprogram-management/basic-info-management/setSignature.html
     * @param $authorizer_access_token
     * @param $signature
     * @return mixed
     */
    public function set_signature($authorizer_access_token, $signature)
    {
        $api_url = self::API_APP . '/cgi-bin/account/modifysignature';
        $params = [
            'access_token' => $authorizer_access_token,
        ];
        $data = [
            'signature' => $signature,
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 获取搜索状态
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/openApi/OpenApiDoc/miniprogram-management/basic-info-management/getSearchStatus.html
     * @param $authorizer_access_token
     * @return mixed
     */
    public function get_search_status($authorizer_access_token)
    {
        $api_url = self::API_APP . '/wxa/getwxasearchstatus';
        $params = [
            'access_token' => $authorizer_access_token,
        ];
        return $this->https_get($api_url, $params);
    }

    /**
     * @title 设置搜索状态
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/openApi/OpenApiDoc/miniprogram-management/basic-info-management/setSearchStatus.html
     * @param $authorizer_access_token
     * @param $status
     * @return mixed
     */
    public function set_search_status($authorizer_access_token, $status = 1)
    {
        $api_url = self::API_APP . '/wxa/changewxasearchstatus';
        $params = [
            'access_token' => $authorizer_access_token,
        ];
        $data = [
            'status' => $status,
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 数据预拉取和数据周期性更新
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/openApi/OpenApiDoc/miniprogram-management/basic-info-management/getFetchdataSetting.html
     * @param $authorizer_access_token
     * @param $data
     * @return mixed
     */
    public function get_fetchdata_setting($authorizer_access_token, $data = [])
    {
        $api_url = self::API_APP . '/wxa/fetchdatasetting';
        $params = [
            'access_token' => $authorizer_access_token,
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 修改头像
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/openApi/OpenApiDoc/miniprogram-management/basic-info-management/setHeadImage.html
     * @param $authorizer_access_token
     * @param $body
     * @return mixed
     */
    public function set_head_image($authorizer_access_token, $body = [])
    {
        $api_url = self::API_APP . '/cgi-bin/account/modifyheadimage';
        $params = [
            'access_token' => $authorizer_access_token,
        ];
        return $this->https_post($api_url, $params, json_encode($body));
    }

    /**
     * @title 查询开放平台帐号是否与小程序同主体
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/openApi/OpenApiDoc/miniprogram-management/basic-info-management/getBindOpenAccountEntity.html
     * @param $authorizer_access_token
     * @return mixed
     */
    public function get_bind_open_account_entity($authorizer_access_token)
    {
        $api_url = self::API_APP . '/cgi-bin/open/sameentity';
        $params = [
            'access_token' => $authorizer_access_token,
        ];
        return $this->https_get($api_url, $params);
    }

    /**
     * @title 获取订单页path信息
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/openApi/OpenApiDoc/miniprogram-management/basic-info-management/getOrderPathInfo.html
     * @param $authorizer_access_token
     * @param $info_type
     * @return mixed
     */
    public function get_order_path_info($authorizer_access_token, $info_type = 0)
    {
        $api_url = self::API_APP . '/wxa/security/getorderpathinfo';
        $params = [
            'access_token' => $authorizer_access_token,
        ];
        $body = [
            'info_type' => $info_type
        ];
        return $this->https_post($api_url, $params, json_encode($body));
    }

    /**
     * @title 申请设置订单页path信息
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/openApi/OpenApiDoc/miniprogram-management/basic-info-management/applySetOrderPathInfo.html
     * @param $authorizer_access_token
     * @param $body
     * @return mixed
     */
    public function apply_set_order_path_info($authorizer_access_token, $body)
    {
        $api_url = self::API_APP . '/wxa/security/applysetorderpathinfo';
        $params = [
            'access_token' => $authorizer_access_token,
        ];
        return $this->https_post($api_url, $params, json_encode($body));
    }
}

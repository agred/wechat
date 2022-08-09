<?php

namespace Request\Third;

use Request\Kernel\ApiThird;

/**
 * 小程序代码管理
 * Class Oauth
 * @package Request
 */
class Code extends ApiThird
{
    /**
     * @title 上传小程序代码并生成体验版
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/code/commit.html
     * @param $authorizer_access_token
     * @param $template_id
     * @param $ext_json
     * @param $user_version
     * @param $user_desc
     * @return mixed
     */
    public function commit($authorizer_access_token, $template_id, $ext_json, $user_version, $user_desc)
    {
        $api_url = self::API_APP . '/wxa/commit';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        $data    = [
            'template_id'  => $template_id,
            'ext_json'     => $ext_json,
            'user_version' => $user_version,
            'user_desc'    => $user_desc,
        ];
        return $this->https_post($api_url, $params, json_encode($data, JSON_UNESCAPED_UNICODE));
    }

    /**
     * @title 获取已上传的代码的页面列表
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/code/get_page.html
     * @param $authorizer_access_token
     * @return mixed
     */
    public function get_page($authorizer_access_token)
    {
        $api_url = self::API_APP . '/wxa/get_page';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        return $this->https_get($api_url, $params);
    }

    /**
     * @title 获取体验版二维码
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/code/get_qrcode.html
     * @param $authorizer_access_token
     * @param $path
     * @return mixed
     */
    public function get_qrcode($authorizer_access_token, $path)
    {
        $api_url = self::API_APP . '/wxa/get_qrcode';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        if ($path) {
            $params['path'] = urlencode($path);
        }
        return $this->https_get($api_url, $params);
    }

    /**
     * @title 提交审核
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/code/submit_audit.html
     * @param $authorizer_access_token
     * @param $item_list
     * @param $preview_info
     * @param $version_desc
     * @param $feedback_info
     * @param $feedback_stuff
     * @param $ugc_declare
     * @return mixed
     */
    public function submit_audit($authorizer_access_token, $item_list, $preview_info, $version_desc, $feedback_info, $feedback_stuff, $ugc_declare)
    {
        $api_url = self::API_APP . '/wxa/submit_audit';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        $data    = [
            'item_list' => $item_list,
        ];
        if ($preview_info) {
            $data['preview_info'] = $preview_info;
        }
        if ($version_desc) {
            $data['version_desc'] = $version_desc;
        }
        if ($feedback_info) {
            $data['feedback_info'] = $feedback_info;
        }
        if ($feedback_stuff) {
            $data['feedback_stuff'] = $feedback_stuff;
        }
        if ($ugc_declare) {
            $data['ugc_declare'] = $ugc_declare;
        }
        return $this->https_post($api_url, $params, json_encode($data, JSON_UNESCAPED_UNICODE));
    }

    /**
     * @title 查询指定发布审核单的审核状态
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/code/get_auditstatus.html
     * @param $authorizer_access_token
     * @param $auditid
     * @return mixed
     */
    public function get_audit_status($authorizer_access_token, $auditid)
    {
        $api_url = self::API_APP . '/wxa/get_auditstatus';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        $data    = [
            'auditid' => $auditid
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 查询最新一次提交的审核状态
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/code/get_latest_auditstatus.html
     * @param $authorizer_access_token
     * @return mixed
     */
    public function get_last_audit_status($authorizer_access_token)
    {
        $api_url = self::API_APP . '/wxa/get_latest_auditstatus';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        return $this->https_get($api_url, $params);
    }

    /**
     * @title 小程序审核撤回
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/code/undocodeaudit.html
     * @param $authorizer_access_token
     * @return mixed
     */
    public function undocodeaudit($authorizer_access_token)
    {
        $api_url = self::API_APP . '/wxa/undocodeaudit';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        return $this->https_get($api_url, $params);
    }

    /**
     * @title 发布已通过审核的小程序
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/code/release.html
     * @param $authorizer_access_token
     * @return mixed
     */
    public function release($authorizer_access_token, $data = '{}')
    {
        $api_url = self::API_APP . '/wxa/release';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        $data = $data == '{}' ? $data : json_encode($data);
        return $this->https_post($api_url, $params, $data);
    }

    /**
     * @title 查询小程序版本信息
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/code/get_versioninfo.html
     * @param $authorizer_access_token
     * @return mixed
     */
    public function get_version_info($authorizer_access_token, $data = '{}')
    {
        $api_url = self::API_APP . '/wxa/getversioninfo';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        $data = $data == '{}' ? $data : json_encode($data);
        return $this->https_post($api_url, $params, $data);
    }

    /**
     * @title 获取可回退的小程序版本
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/code/get_history_version.html
     * @param $authorizer_access_token
     * @param $action
     * @return mixed
     */
    public function get_history_version($authorizer_access_token, $action = 'get_history_version')
    {
        $api_url = self::API_APP . '/wxa/revertcoderelease';
        $params  = [
            'access_token' => $authorizer_access_token,
            'action'       => $action,
        ];
        return $this->https_get($api_url, $params);
    }

    /**
     * @title 版本回退
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/code/revertcoderelease.html
     * @param $authorizer_access_token
     * @param $app_version
     * @return mixed
     */
    public function revertcoderelease($authorizer_access_token, $app_version)
    {
        $api_url = self::API_APP . '/wxa/revertcoderelease';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        if ($app_version) {
            $params['app_version'] = $app_version;
        }
        return $this->https_get($api_url, $params);
    }

    /**
     * @title 加急审核申请
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/code/speedup_audit.html
     * @param $authorizer_access_token
     * @param $auditid
     * @return mixed
     */
    public function speedup_audit($authorizer_access_token, $auditid)
    {
        $api_url = self::API_APP . '/wxa/speedupaudit';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        $data    = [
            'auditid' => $auditid
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }
}

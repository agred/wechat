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
     * @param $access_token
     * @param $template_id
     * @param $ext_json
     * @param $user_version
     * @param $user_desc
     * @return bool|mixed|string
     */
    public function commit($access_token, $template_id, $ext_json, $user_version, $user_desc)
    {
        $api_url = self::API_APP . '/wxa/commit';
        $params  = [
            'access_token' => $access_token,
        ];
        $data    = [
            'template_id'  => $template_id,
            'ext_json'     => $ext_json,
            'user_version' => $user_version,
            'user_desc'    => $user_desc,
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 获取已上传的代码的页面列表
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/code/get_page.html
     * @param $access_token
     * @return bool|mixed|string
     */
    public function get_page($access_token)
    {
        $api_url = self::API_APP . '/wxa/get_page';
        $params  = [
            'access_token' => $access_token,
        ];
        return $this->https_get($api_url, $params);
    }

    /**
     * @title 获取体验版二维码
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/code/get_qrcode.html
     * @param $access_token
     * @param $path
     * @return bool|string
     */
    public function get_qrcode($access_token, $path)
    {
        $api_url = self::API_APP . '/wxa/get_qrcode';
        $params  = [
            'access_token' => $access_token,
            'path'         => $path,
        ];
        return $this->https_get($api_url, $params);
    }

    /**
     * @title 提交审核
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/code/submit_audit.html
     * @param $access_token
     * @param $item_list
     * @param $preview_info
     * @param $version_desc
     * @param $feedback_info
     * @param $feedback_stuff
     * @param $ugc_declare
     * @return bool|mixed|string
     */
    public function submit_audit($access_token, $item_list, $preview_info, $version_desc, $feedback_info, $feedback_stuff, $ugc_declare)
    {
        $api_url = self::API_APP . '/wxa/submit_audit';
        $params  = [
            'access_token' => $access_token,
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
        return $this->https_post($api_url, $params, json_encode($data));
    }
}

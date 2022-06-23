<?php

namespace Request\Third;

use Request\Kernel\ApiThird;

/**
 * 小程序用户隐私保护指引
 * Class Oauth
 * @package Request
 */
class Privacy extends ApiThird
{
    /**
     * @title 配置小程序用户隐私保护指引
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/privacy_config/set_privacy_setting.html
     * @param $authorizer_access_token
     * @param $owner_setting
     * @param $privacy_ver
     * @param $setting_list
     * @return mixed
     */
    public function set_privacy_setting($authorizer_access_token, $owner_setting, $privacy_ver, $setting_list)
    {
        $api_url = self::API_APP . '/cgi-bin/component/setprivacysetting';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        $data    = [
            'owner_setting' => $owner_setting,
        ];
        if ($privacy_ver) {
            $data['privacy_ver'] = $privacy_ver;
        }
        if ($setting_list) {
            $data['setting_list'] = $setting_list;
        }
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 查询小程序用户隐私保护指引
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/privacy_config/get_privacy_setting.html
     * @param $authorizer_access_token
     * @param $privacy_ver
     * @return mixed
     */
    public function get_privacy_setting($authorizer_access_token, $privacy_ver)
    {
        $api_url = self::API_APP . '/cgi-bin/component/getprivacysetting';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        $data    = [];
        if ($privacy_ver) {
            $data['privacy_ver'] = $privacy_ver;
        }
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 上传小程序用户隐私保护指引
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/privacy_config/upload_privacy_exfile.html
     * @param $authorizer_access_token
     * @param $file
     * @return mixed
     */
    public function upload_privacy_ext_file($authorizer_access_token, $file)
    {
        $api_url = self::API_APP . '/cgi-bin/component/uploadprivacyextfile';
        $params  = [
            'access_token' => $authorizer_access_token,
            'file'         => $file,
        ];
        return $this->https_file($api_url, $params);
    }

    /**
     * @title 获取隐私接口列表
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/apply_api/get_privacy_interface.html
     * @param $authorizer_access_token
     * @return mixed
     */
    public function get_privacy_interface($authorizer_access_token)
    {
        $api_url = self::API_APP . '/cgi-bin/component/get_privacy_interface';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        return $this->https_get($api_url, $params);
    }

    /**
     * @title 申请接口
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/apply_api/apply_privacy_interface.html
     * @param $authorizer_access_token
     * @param $api_name
     * @param $content
     * @param $url_list
     * @param $pic_list
     * @param $video_list
     * @return mixed
     */
    public function apply_privacy_interface($authorizer_access_token, $api_name, $content, $url_list, $pic_list, $video_list)
    {
        $api_url = self::API_APP . '/wxa/security/apply_privacy_interface';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        $data    = [
            'api_name' => $api_name,
            'content'  => $content,
        ];
        if ($url_list) {
            $data['url_list'] = $url_list;
        }
        if ($pic_list) {
            $data['pic_list'] = $pic_list;
        }
        if ($video_list) {
            $data['video_list'] = $video_list;
        }
        return $this->https_post($api_url, $params, json_encode($data));
    }
}

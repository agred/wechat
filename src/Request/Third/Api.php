<?php

namespace Request\Third;

use Request\Kernel\ApiThird;

/**
 * Api管理
 * Class Oauth
 * @package Request
 */
class Api extends ApiThird
{
    /**
     * @title 清空 api 的调用quota
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/openApi/clear_quota.html
     * @param $access_token
     * @param $appid
     * @return mixed
     */
    public function clear_quota($access_token, $appid)
    {
        $api_url = self::API_APP . '/cgi-bin/clear_quota';
        $params  = [
            'access_token' => $access_token,
        ];
        $data    = [
            'appid' => $appid,
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 查询 openApi 调用quota
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/openApi/get_api_quota.html
     * @param $access_token
     * @param $cgi_path
     * @return mixed
     */
    public function get_quota($access_token, $cgi_path)
    {
        $api_url = self::API_APP . '/openapi/quota/get';
        $params  = [
            'access_token' => $access_token,
        ];
        $data    = [
            'cgi_path' => $cgi_path,
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 查询 rid 信息
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/openApi/get_rid_info.html
     * @param $access_token
     * @param $rid
     * @return mixed
     */
    public function get_rid($access_token, $rid)
    {
        $api_url = self::API_APP . '/cgi-bin/openapi/rid/get';
        $params  = [
            'access_token' => $access_token,
        ];
        $data    = [
            'rid' => $rid,
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 新增临时素材
     * @Scope
     * @url https://developers.weixin.qq.com/doc/offiaccount/Asset_Management/New_temporary_materials.html
     * @param string $access_token
     * @param string $type 媒体文件类型，分别有图片（image）、语音（voice）、视频（video），普通文件（thumb）
     * @param string $file 上传文件
     */
    public function upload_media($access_token, $type, $file)
    {
        $api_url = self::API_APP . '/cgi-bin/media/upload?access_token=' . $access_token . '&type=' . $type;
        return $this->https_byte($api_url, $file);
    }

    /**
     * @title 获取临时素材
     * @Scope
     * @url https://developers.weixin.qq.com/doc/offiaccount/Asset_Management/Get_temporary_materials.html
     * @param string $access_token
     * @param string $media_id
     */
    public function get_media($access_token, $media_id)
    {
        $api_url = self::API_APP . '/cgi-bin/media/get';
        $params = [
            'access_token' => $access_token,
            'media_id'     => $media_id
        ];
        return $this->https_file($api_url, $params);
    }
}

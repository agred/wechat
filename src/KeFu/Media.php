<?php

namespace KeFu;

use KeFu\Kernel\BaseApi;

/**
 * 素材管理
 * Class Media
 * @package KeFu
 */
class Media extends BaseApi
{

    /**
     * @title 上传临时素材
     * @Scope
     * @url https://open.work.weixin.qq.com/kf/doc/92512/93143/93349
     * @param string $access_token
     * @param string $type 媒体文件类型，分别有图片（image）、语音（voice）、视频（video），普通文件（file）
     * @param string $file 上传文件
     */
    public function upload($access_token, $type, $file)
    {
        $api_url = self::OPEN_API . '/cgi-bin/media/upload/?access_token=' . $access_token . '&type=' . $type;
        return $this->https_byte($api_url, $file);
    }

    /**
     * @title 获取临时素材
     * @Scope
     * @url https://open.work.weixin.qq.com/kf/doc/92512/93143/93349
     * @param string $access_token
     * @param string $media_id
     */
    public function get($access_token, $media_id)
    {
        $api_url = self::OPEN_API . '/cgi-bin/media/get/';
        $params = [
            'access_token' => $access_token,
            'media_id' => $media_id
        ];
        return $this->https_get($api_url, $params);
    }

}

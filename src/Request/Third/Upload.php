<?php

namespace Request\Third;

use Request\Kernel\ApiThird;

/**
 * 上传管理
 * Class Oauth
 * @package Request
 */
class Upload extends ApiThird
{

    /**
     * @title 上传提审素材
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/openApi/OpenApiDoc/miniprogram-management/code-management/uploadMediaToCodeAudit.html
     * @param $authorizer_access_token
     * @param $media
     * @return mixed
     */
    public function upload_media($authorizer_access_token, $media)
    {
        $api_url = self::API_APP . '/wxa/uploadmedia';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        $api_url = $api_url . '?' . http_build_query($params);
        return $this->https_upload($api_url, $media);
    }
}

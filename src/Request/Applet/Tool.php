<?php

namespace Request\Applet;

use Request\Kernel\ApiApplet;

/**
 * URL 其他工具
 * Class Tool
 * @package Request
 */
class Tool extends ApiApplet
{
    /**
     * @title 本接口用于获得指定用户可以领取的红包封面链接。获取参数ctoken参考微信红包封面开放平台
     * @Scope
     * @url https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/redpacketcover/redpacketcover.getAuthenticationUrl.html
     * @param string $access_token
     * @param string $openid
     * @param string $ctoken
     */
    public function getAuthenticationUrl($access_token, $openid, $ctoken)
    {
        $api_url = self::API_APP . '/redpacketcover/wxapp/cover_url/get_by_token';
        $params  = [
            'access_token' => $access_token
        ];
        $data    = [
            'openid' => $openid,
            'ctoken' => $ctoken
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 查询域名配置
     * @Scope
     * @url https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/operation/operation.getDomainInfo.html
     * @param string $access_token
     * @param string $action 查询配置域名的类型, 可选值如下： 1. getbizdomain 返回业务域名 2. getserverdomain 返回服务器域名
     */
    public function getDomainInfo($access_token, $action = null)
    {
        $api_url = self::API_APP . '/wxa/getwxadevinfo';
        $params  = [
            'access_token' => $access_token
        ];
        if ($action) {
            $params['action'] = $action;
        }
        return $this->https_get($api_url, $params);
    }

    /**
     * @title 获取用户反馈列表。获取图片实体请参考接口 getFeedbackmedia
     * @Scope
     * @url https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/operation/operation.getFeedback.html
     * @param string $access_token
     * @param int|null $type
     * @param int $page
     * @param int $num
     */
    public function getFeedback($access_token, $type = null, $page = 1, $num = 10)
    {
        $api_url = self::API_APP . '/wxaapi/feedback/list';
        $params  = [
            'access_token' => $access_token,
            'page'         => $page,
            'num'          => $num,
        ];
        if ($type) {
            $params['type'] = $type;
        }
        return $this->https_get($api_url, $params);
    }

    /**
     * @title 获取 mediaId 图片
     * @Scope
     * @url https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/operation/operation.getFeedbackmedia.html
     * @param string $access_token
     * @param string $record_id
     * @param string $media_id
     */
    public function getFeedbackmedia($access_token, $record_id, $media_id)
    {
        $api_url = self::API_APP . '/cgi-bin/media/getfeedbackmedia';
        $params  = [
            'access_token' => $access_token,
            'record_id'    => $record_id,
            'media_id'     => $media_id,
        ];
        return $this->https_get($api_url, $params);
    }

    /**
     * @title 查询当前分阶段发布详情
     * @Scope
     * @url https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/operation/operation.getGrayReleasePlan.html
     * @param string $access_token
     */
    public function getGrayReleasePlan($access_token)
    {
        $api_url = self::API_APP . '/wxa/getgrayreleaseplan';
        $params  = [
            'access_token' => $access_token,
        ];
        return $this->https_get($api_url, $params);
    }

    /**
     * @title 获取访问来源
     * @Scope
     * @url https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/operation/operation.getSceneList.html
     * @param string $access_token
     */
    public function getSceneList($access_token)
    {
        $api_url = self::API_APP . '/wxaapi/log/get_scene';
        $params  = [
            'access_token' => $access_token,
        ];
        return $this->https_get($api_url, $params);
    }

    /**
     * @title 获取客户端版本
     * @Scope
     * @url https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/operation/operation.getVersionList.html
     * @param string $access_token
     */
    public function getVersionList($access_token)
    {
        $api_url = self::API_APP . '/wxaapi/log/get_client_version';
        $params  = [
            'access_token' => $access_token,
        ];
        return $this->https_get($api_url, $params);
    }
}

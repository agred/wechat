<?php

namespace Request\Applet;

use Request\Kernel\ApiApplet;

/**
 * 消息处理
 * Class Message
 * @package Request
 */
class Message extends ApiApplet
{
    /**
     * @title 发送订阅消息
     * @Scope
     * @url https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/subscribe-message/subscribeMessage.send.html
     * @param string $access_token
     * @param string $touser
     * @param string $template_id
     * @param object $body
     * @param string $page
     * @param string $miniprogram_state
     * @param string $lang
     */
    public function subscribeMessageSend($access_token, $touser, $template_id, $body, $page = null, $miniprogram_state = 'formal', $lang = 'zh_CN')
    {
        $api_url = self::APP_API . '/cgi-bin/message/subscribe/send';
        $params = [
            'access_token' => $access_token
        ];
        $data     = [
            'touser' => $touser,
            'template_id' => $template_id,
            'data' => $body,
            'miniprogram_state' => $miniprogram_state,
            'lang' => $lang,
        ];
        if ($page) $data['page'] = $page;
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 开发者可以通过该接口向用户发送设备消息
     * @Scope
     * @url https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/hardware-device/hardwareDevice.send.html
     * @param string $access_token
     * @param object $to_openid_list
     * @param string $template_id
     * @param string $sn
     * @param string $modelId
     * @param object $body
     * @param string $page
     * @param string $miniprogram_state
     * @param string $lang
     */
    public function hardwareDeviceSend($access_token, $to_openid_list, $template_id, $sn, $modelId, $body, $page = null, $miniprogram_state = 'formal', $lang = 'zh_CN')
    {
        $api_url = self::APP_API . '/cgi-bin/message/device/subscribe/send';
        $params = [
            'access_token' => $access_token
        ];
        $data     = [
            'to_openid_list' => $to_openid_list,
            'template_id' => $template_id,
            'sn' => $sn,
            'modelId' => $modelId,
            'data' => $body,
            'miniprogram_state' => $miniprogram_state,
            'lang' => $lang,
        ];
        if ($page) $data['page'] = $page;
        return $this->https_post($api_url, $params, json_encode($data));
    }
}

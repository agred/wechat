<?php

namespace KeFu;

use KeFu\Kernel\BaseApi;

/**
 * 客服消息
 * Class Event
 * @package KeFu
 */
class Event extends BaseApi
{

    /**
     * @title 获取消息
     * @Scope
     * @url https://open.work.weixin.qq.com/kf/doc/92512/93143/94745
     * @param string $access_token
     * @param string $cursor
     * @param string $token 回调事件返回的token字段，10分钟内有效；可不填，如果不填接口有严格的频率限制。
     * @param int $limit 请求的数据量
     */
    public function sync_msg($access_token, $cursor, $token, $limit = 1000)
    {
        $api_url = self::OPEN_API . '/cgi-bin/kf/sync_msg';
        $params = [
            'access_token' => $access_token
        ];
        $data = [
            'cursor' => $cursor,
            'token' => $token,
            'limit' => $limit
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 发送消息
     * @Scope
     * @url https://open.work.weixin.qq.com/kf/doc/92512/93143/94744
     * @param string $access_token
     * @param array $data
     */
    public function send_msg($access_token, $data = [])
    {
        $api_url = self::OPEN_API . '/cgi-bin/kf/send_msg';
        $params = [
            'access_token' => $access_token
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 发送事件响应消息
     * @Scope
     * @url https://open.work.weixin.qq.com/kf/doc/92512/93143/95123
     * @param string $access_token
     * @param string $code
     * @param string $msgid
     * @param string $msgtype
     */
    public function send_msg_on_event($access_token, $code, $msgid, $msgtype)
    {
        $api_url = self::OPEN_API . '/cgi-bin/kf/send_msg_on_event';
        $params = [
            'access_token' => $access_token
        ];
        $data = [
            'code' => $code,
            'msgid' => $msgid,
            'msgtype' => $msgtype
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

}

<?php

namespace Request\KeFu;

use Request\Kernel\ApiKeFu;

/**
 * 客服账号
 * Class Account
 * @package Request
 */
class Account extends ApiKeFu
{
    /**
     * @title 添加客服账号
     * @Scope
     * @url https://open.work.weixin.qq.com/kf/doc/92512/93143/94747
     * @param string $access_token
     * @param string $name
     * @param string $media_id
     */
    public function add($access_token, $name, $media_id)
    {
        $api_url = self::QY_API . '/cgi-bin/kf/account/add';
        $params = [
            'access_token' => $access_token
        ];
        $data = [
            'name' => $name,
            'media_id' => $media_id
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 修改客服账号
     * @Scope
     * @url https://open.work.weixin.qq.com/kf/doc/92512/93143/94750
     * @param string $access_token
     * @param string $open_kfid
     * @param string $name
     * @param string $media_id
     */
    public function update($access_token, $open_kfid, $name, $media_id)
    {
        $api_url = self::QY_API . '/cgi-bin/kf/account/update';
        $params = [
            'access_token' => $access_token
        ];
        $data = [
            'open_kfid' => $open_kfid,
            'name' => $name,
            'media_id' => $media_id
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 删除客服账号
     * @Scope
     * @url https://open.work.weixin.qq.com/kf/doc/92512/93143/94749
     * @param string $access_token
     * @param string $open_kfid
     */
    public function del($access_token, $open_kfid)
    {
        $api_url = self::QY_API . '/cgi-bin/kf/account/del';
        $params = [
            'access_token' => $access_token
        ];
        $data = [
            'open_kfid' => $open_kfid
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 获取客服账号列表
     * @Scope
     * @url https://open.work.weixin.qq.com/kf/doc/92512/93143/94746
     * @param string $access_token
     */
    public function get_list($access_token)
    {
        $api_url = self::QY_API . '/cgi-bin/kf/account/list';
        $params = [
            'access_token' => $access_token
        ];
        return $this->https_get($api_url, $params);
    }

    /**
     * @title 获取客服账号链接
     * @Scope
     * @url https://open.work.weixin.qq.com/kf/doc/92512/93143/94751
     * @param string $access_token
     * @param string $open_kfid
     * @param string $scene
     */
    public function add_contact_way($access_token, $open_kfid, $scene = '123456')
    {
        $api_url = self::QY_API . '/cgi-bin/kf/add_contact_way';
        $params = [
            'access_token' => $access_token
        ];
        $data = [
            'open_kfid' => $open_kfid,
            'scene' => $scene
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }
}

<?php

namespace Request\Applet;

use Request\Kernel\ApiApplet;

/**
 * 用户信息
 * Class User
 * @package Request
 */
class User extends ApiApplet
{
    /**
     * @title 检查加密信息是否由微信生成（当前只支持手机号加密数据），只能检测最近3天生成的加密数据
     * @Scope
     * @url https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/user-info/auth.checkEncryptedData.html
     * @param string $access_token
     * @param string $encrypted_msg_hash
     */
    public function checkEncryptedData($access_token, $encrypted_msg_hash)
    {
        $api_url = self::API_APP . '/wxa/business/checkencryptedmsg';
        $params  = [
            'access_token' => $access_token
        ];
        $data    = [
            'encrypted_msg_hash' => $encrypted_msg_hash
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 用户支付完成后，获取该用户的 UnionId，无需用户授权。本接口支持第三方平台代理查询。
     * @Scope
     * @url https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/user-info/auth.getPaidUnionId.html
     * @param string $access_token
     * @param string $openid
     * @param string $transaction_id
     * @param string $mch_id
     * @param string $out_trade_no
     */
    public function getPaidUnionId($access_token, $openid, $transaction_id, $mch_id = null, $out_trade_no = null)
    {
        $api_url = self::API_APP . '/wxa/getpaidunionid';
        $params  = [
            'access_token'   => $access_token,
            'openid'         => $openid,
            'transaction_id' => $transaction_id,
        ];
        if ($mch_id) {
            $params['mch_id'] = $mch_id;
        }
        if ($out_trade_no) {
            $params['out_trade_no'] = $out_trade_no;
        }
        return $this->https_get($api_url, $params);
    }

    /**
     * @title 通过 wx.pluginLogin 接口获得插件用户标志凭证 code 后传到开发者服务器，开发者服务器调用此接口换取插件用户的唯一标识 openpid。
     * @Scope
     * @url https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/user-info/auth.getPluginOpenPId.html
     * @param string $access_token
     * @param string $code
     */
    public function getPluginOpenPId($access_token, $code)
    {
        $api_url = self::API_APP . '/wxa/getpluginopenpid';
        $params  = [
            'access_token' => $access_token
        ];
        $data    = [
            'code' => $code
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title code换取用户手机号。 每个code只能使用一次，code的有效期为5min
     * @Scope
     * @url https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/phonenumber/phonenumber.getPhoneNumber.html
     * @param string $access_token
     * @param string $code
     */
    public function getPhoneNumber($access_token, $code)
    {
        $api_url = self::API_APP . '/wxa/business/getuserphonenumber';
        $params  = [
            'access_token' => $access_token
        ];
        $data    = [
            'code' => $code
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 获取用户encryptKey。 会获取用户最近3次的key，每个key的存活时间为3600s
     * @Scope
     * @url https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/internet/internet.getUserEncryptKey.html
     * @param string $access_token
     * @param string $openid
     * @param string $signature
     */
    public function getUserEncryptKey($access_token, $openid, $signature)
    {
        $api_url = self::API_APP . '/wxa/business/getuserencryptkey';
        $params  = [
            'access_token' => $access_token
        ];
        $data    = [
            'openid'     => $openid,
            'signature'  => $signature,
            'sig_method' => 'hmac_sha256',
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }
}

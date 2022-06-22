<?php

namespace Request\Third;

use Request\Kernel\ApiThird;

/**
 * 小程序模板管理
 * Class Oauth
 * @package Request
 */
class Template extends ApiThird
{
    /**
     * @title 获取代码草稿列表
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/ThirdParty/code_template/gettemplatedraftlist.html
     * @param $access_token
     * @return bool|mixed|string
     */
    public function get_template_draft_list($access_token)
    {
        $api_url = self::API_APP . '/wxa/gettemplatedraftlist';
        $params  = [
            'access_token' => $access_token,
        ];
        return $this->https_get($api_url, $params);
    }

    /**
     * @title 将草稿添加到代码模板库
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/ThirdParty/code_template/addtotemplate.html
     * @param $access_token
     * @param $draft_id
     * @param $template_type
     * @return bool|mixed|string
     */
    public function add_to_template($access_token, $draft_id, $template_type = null)
    {
        $api_url = self::API_APP . '/wxa/addtotemplate';
        $params  = [
            'access_token' => $access_token,
        ];
        $data    = [
            'draft_id' => $draft_id,
        ];
        if (!is_null($template_type)) {
            $data['template_type'] = $template_type;
        }
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 获取代码模板列表
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/ThirdParty/code_template/gettemplatelist.html
     * @param $access_token
     * @param $template_type
     * @return bool|string
     */
    public function get_template_list($access_token, $template_type = null)
    {
        $api_url = self::API_APP . '/wxa/gettemplatelist';
        $params  = [
            'access_token' => $access_token,
        ];
        if (!is_null($template_type)) {
            $params['template_type'] = $template_type;
        }
        return $this->https_get($api_url, $params);
    }

    /**
     * @title 删除指定代码模板
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/ThirdParty/code_template/deletetemplate.html
     * @param $access_token
     * @param $template_id
     * @return bool|mixed|string
     */
    public function delete_template($access_token, $template_id)
    {
        $api_url = self::API_APP . '/wxa/deletetemplate';
        $params  = [
            'access_token' => $access_token,
        ];
        $data    = [
            'template_id' => $template_id,
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }
}

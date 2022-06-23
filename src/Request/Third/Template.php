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
     * @param $component_access_token
     * @return mixed
     */
    public function get_template_draft_list($component_access_token)
    {
        $api_url = self::API_APP . '/wxa/gettemplatedraftlist';
        $params  = [
            'access_token' => $component_access_token,
        ];
        return $this->https_get($api_url, $params);
    }

    /**
     * @title 将草稿添加到代码模板库
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/ThirdParty/code_template/addtotemplate.html
     * @param $component_access_token
     * @param $draft_id
     * @param $template_type
     * @return mixed
     */
    public function add_to_template($component_access_token, $draft_id, $template_type = null)
    {
        $api_url = self::API_APP . '/wxa/addtotemplate';
        $params  = [
            'access_token' => $component_access_token,
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
     * @param $component_access_token
     * @param $template_type
     * @return mixed
     */
    public function get_template_list($component_access_token, $template_type = null)
    {
        $api_url = self::API_APP . '/wxa/gettemplatelist';
        $params  = [
            'access_token' => $component_access_token,
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
     * @param $component_access_token
     * @param $template_id
     * @return mixed
     */
    public function delete_template($component_access_token, $template_id)
    {
        $api_url = self::API_APP . '/wxa/deletetemplate';
        $params  = [
            'access_token' => $component_access_token,
        ];
        $data    = [
            'template_id' => $template_id,
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }
}

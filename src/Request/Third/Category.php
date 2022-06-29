<?php

namespace Request\Third;

use Request\Kernel\ApiThird;

/**
 * 小程序类目管理
 * Class Oauth
 * @package Request
 */
class Category extends ApiThird
{
    /**
     * @title 获取可以设置的所有类目
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/category/getallcategories.html
     * @param $authorizer_access_token
     * @return mixed
     */
    public function get_all_categories($authorizer_access_token)
    {
        $api_url = self::API_APP . '/cgi-bin/wxopen/getallcategories';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        return $this->https_get($api_url, $params);
    }

    /**
     * @title 获取已设置的所有类目
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/category/getcategory.html
     * @param $authorizer_access_token
     * @return mixed
     */
    public function get_all_category($authorizer_access_token)
    {
        $api_url = self::API_APP . '/cgi-bin/wxopen/getcategory';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        return $this->https_get($api_url, $params);
    }

    /**
     * @title 获取不同主体类型的类目
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/category/getcategorybytype.html
     * @param $authorizer_access_token
     * @param $verify_type
     * @return mixed
     */
    public function get_categories_by_type($authorizer_access_token, $verify_type)
    {
        $api_url = self::API_APP . '/cgi-bin/wxopen/getcategoriesbytype';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        $data    = [];
        if ($verify_type) {
            $data['verify_type'] = $verify_type;
        }
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 添加类目
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/category/addcategory.html
     * @param $authorizer_access_token
     * @param $categories
     * @return mixed
     */
    public function add_category($authorizer_access_token, $categories)
    {
        $api_url = self::API_APP . '/cgi-bin/wxopen/addcategory';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        $data    = [
            'categories' => $categories
        ];
        return $this->https_post($api_url, $params, json_encode($data, JSON_UNESCAPED_UNICODE));
    }

    /**
     * @title 删除类目
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/category/deletecategory.html
     * @param $authorizer_access_token
     * @param $first
     * @param $second
     * @return mixed
     */
    public function delete_category($authorizer_access_token, $first, $second)
    {
        $api_url = self::API_APP . '/cgi-bin/wxopen/deletecategory';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        $data    = [
            'first'  => $first,
            'second' => $second,
        ];
        return $this->https_post($api_url, $params, json_encode($data, JSON_UNESCAPED_UNICODE));
    }

    /**
     * @title 修改类目资质信息
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/category/modifycategory.html
     * @param $authorizer_access_token
     * @param $first
     * @param $second
     * @param $certicates
     * @return mixed
     */
    public function modify_category($authorizer_access_token, $first, $second, $certicates)
    {
        $api_url = self::API_APP . '/cgi-bin/wxopen/modifycategory';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        $data    = [
            'first'  => $first,
            'second' => $second,
            'certicates' => $certicates,
        ];
        return $this->https_post($api_url, $params, json_encode($data, JSON_UNESCAPED_UNICODE));
    }

    /**
     * @title 获取审核时可填写的类目信息
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/Third-party_Platforms/2.0/api/category/get_category.html
     * @param $authorizer_access_token
     * @return mixed
     */
    public function get_category($authorizer_access_token)
    {
        $api_url = self::API_APP . '/wxa/get_category';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        return $this->https_get($api_url, $params);
    }
}

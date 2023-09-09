<?php

namespace Request\Third;

use Request\Kernel\ApiThird;

/**
 * 备案管理
 * Class Oauth
 * @package Request
 */
class Record extends ApiThird
{
    /**
     * @title 发起小程序管理员人脸核身
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/openApi/OpenApiDoc/miniprogram-management/record/createIcpVerifyTask.html
     * @param $authorizer_access_token
     * @param string[] $data
     * @return mixed
     */
    public function create_icp_verifytask($authorizer_access_token, $data = ['action' => 'verify_task'])
    {
        $api_url = self::API_APP . '/wxa/icp/create_icp_verifytask';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 查询人脸核身任务状态
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/openApi/OpenApiDoc/miniprogram-management/record/queryIcpVerifyTask.html
     * @param $authorizer_access_token
     * @param $task_id
     * @return mixed
     */
    public function query_icp_verifytask($authorizer_access_token, $task_id)
    {
        $api_url = self::API_APP . '/wxa/icp/query_icp_verifytask';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        $data = [
            'task_id' => $task_id,
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 上传小程序备案媒体材料
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/openApi/OpenApiDoc/miniprogram-management/record/uploadIcpMedia.html
     * @param $authorizer_access_token
     * @param array $data
     * @return mixed
     */
    public function upload_icp_media($authorizer_access_token, $data = [])
    {
        $api_url = self::API_APP . '/wxa/icp/upload_icp_media';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 申请小程序备案
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/openApi/OpenApiDoc/miniprogram-management/record/applyIcpFiling.html
     * @param $authorizer_access_token
     * @param array $data
     * @return mixed
     */
    public function apply_icp_filing($authorizer_access_token, $data = [])
    {
        $api_url = self::API_APP . '/wxa/icp/apply_icp_filing';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 撤回小程序备案申请
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/openApi/OpenApiDoc/miniprogram-management/record/cancelApplyIcpFiling.html
     * @param $authorizer_access_token
     * @param string[] $data
     * @return mixed
     */
    public function cancel_apply_icp_filing($authorizer_access_token, $data = ['action' => 'icp_filing'])
    {
        $api_url = self::API_APP . '/wxa/icp/cancel_apply_icp_filing';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 注销小程序备案
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/openApi/OpenApiDoc/miniprogram-management/record/cancelIcpfiling.html
     * @param $authorizer_access_token
     * @param int $cancel_type
     * @return mixed
     */
    public function cancel_icp_filing($authorizer_access_token, $cancel_type = 1)
    {
        $api_url = self::API_APP . '/wxa/icp/cancel_icp_filing';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        $data = [
            'cancel_type' => $cancel_type,
        ];
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 获取小程序备案状态及驳回原因
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/openApi/OpenApiDoc/miniprogram-management/record/getIcpEntranceInfo.html
     * @param $authorizer_access_token
     * @return mixed
     */
    public function get_icp_entrance_info($authorizer_access_token)
    {
        $api_url = self::API_APP . '/wxa/icp/get_icp_entrance_info';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        return $this->https_get($api_url, $params);
    }

    /**
     * @title 获取小程序已备案详情
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/openApi/OpenApiDoc/miniprogram-management/record/getOnlineIcpOrder.html
     * @param $authorizer_access_token
     * @return mixed
     */
    public function get_online_icp_order($authorizer_access_token)
    {
        $api_url = self::API_APP . '/wxa/icp/get_online_icp_order';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        return $this->https_get($api_url, $params);
    }

    /**
     * @title 获取小程序服务内容类型
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/openApi/OpenApiDoc/miniprogram-management/record/queryIcpServiceContentTypes.html
     * @param $authorizer_access_token
     * @return mixed
     */
    public function query_icp_service_content_types($authorizer_access_token)
    {
        $api_url = self::API_APP . '/wxa/icp/query_icp_service_content_types';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        return $this->https_get($api_url, $params);
    }

    /**
     * @title 获取证件类型
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/openApi/OpenApiDoc/miniprogram-management/record/queryIcpCertificateTypes.html
     * @param $authorizer_access_token
     * @return mixed
     */
    public function query_icp_certificate_types($authorizer_access_token)
    {
        $api_url = self::API_APP . '/wxa/icp/query_icp_certificate_types';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        return $this->https_get($api_url, $params);
    }

    /**
     * @title 获取区域信息
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/openApi/OpenApiDoc/miniprogram-management/record/queryIcpDistrictCode.html
     * @param $authorizer_access_token
     * @return mixed
     */
    public function query_icp_district_code($authorizer_access_token)
    {
        $api_url = self::API_APP . '/wxa/icp/query_icp_district_code';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        return $this->https_get($api_url, $params);
    }

    /**
     * @title 获取前置审批项类型
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/openApi/OpenApiDoc/miniprogram-management/record/queryIcpNrlxTypes.html
     * @param $authorizer_access_token
     * @return mixed
     */
    public function query_icp_nrlx_types($authorizer_access_token)
    {
        $api_url = self::API_APP . '/wxa/icp/query_icp_nrlx_types';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        return $this->https_get($api_url, $params);
    }

    /**
     * @title 获取单位性质
     * @Scope
     * @url https://developers.weixin.qq.com/doc/oplatform/openApi/OpenApiDoc/miniprogram-management/record/queryIcpSubjectTypes.html
     * @param $authorizer_access_token
     * @return mixed
     */
    public function query_icp_subject_types($authorizer_access_token)
    {
        $api_url = self::API_APP . '/wxa/icp/query_icp_subject_types';
        $params  = [
            'access_token' => $authorizer_access_token,
        ];
        return $this->https_get($api_url, $params);
    }
}

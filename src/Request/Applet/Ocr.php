<?php

namespace Request\Applet;

use Request\Kernel\ApiApplet;

/**
 * Ocr识别
 * Class Link
 * @package Request
 */
class Ocr extends ApiApplet
{
    /**
     * @title 本接口提供基于小程序的身份证 OCR 识别
     * @Scope
     * @url https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/ocr/ocr.idcard.html
     * @param string $access_token
     * @param string $img_url
     * @param object $img
     */
    public function idcard($access_token, $img_url, $img)
    {
        $api_url = self::API_APP . '/cv/ocr/idcard';
        $params  = [
            'access_token' => $access_token
        ];
        if ($img_url) {
            $data    = [
                'img_url' => $img_url,
            ];
        }
        if ($img) {
            $data    = [
                'img' => $img,
            ];
        }
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 本接口提供基于小程序的银行卡 OCR 识别
     * @Scope
     * @url https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/ocr/ocr.bankcard.html
     * @param string $access_token
     * @param string $img_url
     * @param object $img
     */
    public function bankcard($access_token, $img_url, $img)
    {
        $api_url = self::API_APP . '/cv/ocr/bankcard';
        $params  = [
            'access_token' => $access_token
        ];
        if ($img_url) {
            $data    = [
                'img_url' => $img_url,
            ];
        }
        if ($img) {
            $data    = [
                'img' => $img,
            ];
        }
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 本接口提供基于小程序的营业执照 OCR 识别
     * @Scope
     * @url https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/ocr/ocr.businessLicense.html
     * @param string $access_token
     * @param string $img_url
     * @param object $img
     */
    public function businessLicense($access_token, $img_url, $img)
    {
        $api_url = self::API_APP . '/cv/ocr/bizlicense';
        $params  = [
            'access_token' => $access_token
        ];
        if ($img_url) {
            $data    = [
                'img_url' => $img_url,
            ];
        }
        if ($img) {
            $data    = [
                'img' => $img,
            ];
        }
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 本接口提供基于小程序的驾驶证 OCR 识别
     * @Scope
     * @url https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/ocr/ocr.driverLicense.html
     * @param string $access_token
     * @param string $img_url
     * @param object $img
     */
    public function driverLicense($access_token, $img_url, $img)
    {
        $api_url = self::API_APP . '/cv/ocr/drivinglicense';
        $params  = [
            'access_token' => $access_token
        ];
        if ($img_url) {
            $data    = [
                'img_url' => $img_url,
            ];
        }
        if ($img) {
            $data    = [
                'img' => $img,
            ];
        }
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 本接口提供基于小程序的通用印刷体 OCR 识别
     * @Scope
     * @url https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/ocr/ocr.printedText.html
     * @param string $access_token
     * @param string $img_url
     * @param object $img
     */
    public function printedText($access_token, $img_url, $img)
    {
        $api_url = self::API_APP . '/cv/ocr/comm';
        $params  = [
            'access_token' => $access_token
        ];
        if ($img_url) {
            $data    = [
                'img_url' => $img_url,
            ];
        }
        if ($img) {
            $data    = [
                'img' => $img,
            ];
        }
        return $this->https_post($api_url, $params, json_encode($data));
    }

    /**
     * @title 本接口提供基于小程序的行驶证 OCR 识别
     * @Scope
     * @url https://developers.weixin.qq.com/miniprogram/dev/api-backend/open-api/ocr/ocr.vehicleLicense.html
     * @param string $access_token
     * @param string $img_url
     * @param object $img
     */
    public function vehicleLicense($access_token, $img_url, $img)
    {
        $api_url = self::API_APP . '/cv/ocr/driving';
        $params  = [
            'access_token' => $access_token
        ];
        if ($img_url) {
            $data    = [
                'img_url' => $img_url,
            ];
        }
        if ($img) {
            $data    = [
                'img' => $img,
            ];
        }
        return $this->https_post($api_url, $params, json_encode($data));
    }
}

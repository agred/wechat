<?php

namespace KeFu\Kernel;

/**
 * 内核
 * Class BaseApi
 * @package KeFu\Kernel
 */
class BaseApi
{

    const SDK_VER = '1.0.1';

    const OPEN_API  = "https://qyapi.weixin.qq.com";
    public $corpid    = null;
    public $corpsecret = null;

    public $response = null;

    public function __construct($config)
    {
        $this->corpid = $config['corpid'];
        $this->corpsecret = $config['corpsecret'];
    }

    public function toArray()
    {
        return $this->response ? json_decode($this->response, true) : true;
    }

    public function https_curl($url, $data = [])
    {
        $data['corpid'] = $this->corpid;
        $data['corpsecret'] = $this->corpsecret;
        if($data){
            $url = $url . '?' . http_build_query($data);
        }
        $result = $this->https_request($url, $data);
        return json_decode($result, true);
    }

    public function https_file($url , $params = []){
        $params['corpid'] = $this->corpid;
        $params['corpsecret'] = $this->corpsecret;
        if($params){
            $url = $url . '?' . http_build_query($params);
        }
        return $this->https_request($url);
    }

    public function https_get($url , $params = []){
        $params['corpid'] = $this->corpid;
        $params['corpsecret'] = $this->corpsecret;
        if($params){
            $url = $url . '?' . http_build_query($params);
        }
        $result = $this->https_request($url);
        return json_decode($result, true);
    }

    public function https_post($url, $params = [], $data = []){
        $params['corpid'] = $this->corpid;
        $params['corpsecret'] = $this->corpsecret;
        if($params){
            $url = $url . '?' . http_build_query($params);
        }
        $result = $this->https_request($url, $data);
        return json_decode($result, true);
    }

    public function https_request($url, $data = null, $headers = null)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)) {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT, 30);
        if (!empty($headers)) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        }
        if (defined('CURLOPT_IPRESOLVE') && defined('CURL_IPRESOLVE_V4')) {
            curl_setopt($curl, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        }
        $output = curl_exec($curl);
        curl_close($curl);
        return ($output);
    }

    public function https_byte($url, $file)
    {
        $curl = curl_init();
        if(class_exists('\CURLFile')){
            curl_setopt ( $curl, CURLOPT_SAFE_UPLOAD, true);
            $data = array('media' => new \CURLFile($file));
        }else{
            if (defined ( 'CURLOPT_SAFE_UPLOAD' )) {
                curl_setopt ( $curl, CURLOPT_SAFE_UPLOAD, false );
            }
            $data = array('media' => '@' . realpath($file));
        }
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $output = curl_exec($curl);
        curl_close($curl);
        return json_decode($output, true);
    }

}

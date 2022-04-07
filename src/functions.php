<?php

namespace Request;

/**
 * @title 获取URL某个参数的值
 * @param string $url 路径
 * @param string $key 要获取的参数
 * @return string
 */
function get_query_str($url, $key)
{
    $res = '';
    $a = strpos($url, '?');
    if ($a !== false) {
        $str = substr($url, $a + 1);
        $arr = explode('&', $str);
        foreach ($arr as $k => $v) {
            $tmp = explode('=', $v);
            if (!empty($tmp[0]) && !empty($tmp[1])) {
                $barr[$tmp[0]] = $tmp[1];
            }
        }
    }
    if (!empty($barr[$key])) {
        $res = $barr[$key];
    }
    return $res;
}

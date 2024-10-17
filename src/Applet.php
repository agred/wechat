<?php

use Request\Kernel\DataArray;

/**
 * Class Applet
 * @package Request
 *
 * @method static Request\Applet\Oauth Oauth($options = []) 小程序调用凭证
 * @method static Request\Applet\User User($options = []) 小程序用户信息
 * @method static Request\Applet\Message Message($options = []) 小程序消息处理
 * @method static Request\Applet\Qr Qr($options = []) 小程序码
 * @method static Request\Applet\Tool Tool($options = []) 其他工具
 * @method static Request\Applet\Scheme Scheme($options = []) Scheme
 * @method static Request\Applet\Link Link($options = []) Link
 * @method static Request\Applet\Nfc Nfc($options = []) Nfc
 * @method static Request\Applet\Ocr Ocr($options = []) Ocr识别
 */
class Applet
{
    /**
     * 静态配置
     */
    private static $config;

    /**
     * 设置及获取参数
     * @param array $option
     * @return array
     */
    public static function config($option = null)
    {
        if (is_array($option)) {
            self::$config = new DataArray($option);
        }
        if (self::$config instanceof DataArray) {
            return self::$config->get();
        }
        return [];
    }

    /**
     * 静态魔术加载方法
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        $name  = ucfirst(strtolower($name));
        $class = "\\Request\\Applet\\{$name}";

        if (!empty($class) && class_exists($class)) {
            $option = array_shift($arguments);
            $config = is_array($option) ? $option : self::$config->get();
            return new $class($config);
        }
    }
}

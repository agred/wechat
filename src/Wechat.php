<?php

use Request\Kernel\DataArray;

/**
 * Class Wechat
 * @package Request
 *
 * @method \Request\Applet\AppOauth AppOauth($options = []) static 小程序调用凭证
 * @method \Request\Applet\AppUser AppUser($options = []) static 小程序用户信息
 * @method \Request\Applet\AppMessage AppMessage($options = []) static 小程序消息处理
 * @method \Request\KeFu\KfOauth KfOauth($options = []) static 客服授权
 * @method \Request\KeFu\KfAccount KfAccount($options = []) static 客服账号
 * @method \Request\KeFu\KfEvent KfEvent($options = []) static 客服消息
 * @method \Request\KeFu\KfMedia KfMedia($options = []) static 客服素材
 * @method \Request\KeFu\KfOther KfOther($options = []) static 客服其他
 */
class Wechat
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
    public static function __callStatic($name , $arguments)
    {
        $name = ucfirst(strtolower($name));
        $class = "\\Request\\{$name}";

        if (!empty($class) && class_exists($class)) {
            $option = array_shift($arguments);
            $config = is_array($option) ? $option : self::$config->get();
            return new $class($config);
        }
    }
}

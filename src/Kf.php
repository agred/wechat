<?php

use Request\Kernel\DataArray;

/**
 * Class Kf
 * @package Request
 *
 * @method static Request\KeFu\Oauth Oauth($options = []) 客服授权
 * @method static Request\KeFu\Account Account($options = []) 客服账号
 * @method static Request\KeFu\Event Event($options = []) 客服消息
 * @method static Request\KeFu\Media Media($options = []) 客服素材
 * @method static Request\KeFu\Other Other($options = []) 客服其他
 */
class Kf
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
        $class = "\\Request\\KeFu\\{$name}";

        if (!empty($class) && class_exists($class)) {
            $option = array_shift($arguments);
            $config = is_array($option) ? $option : self::$config->get();
            return new $class($config);
        }
    }
}

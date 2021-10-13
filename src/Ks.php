<?php

use KeFu\Kernel\DataArray;

/**
 * Class Ks
 * @package KeFu
 *
 * @method \KeFu\Oauth Oauth($options = []) static 授权凭证
 * @method \KeFu\User User($options = []) static 用户操作
 * @method \KeFu\Video Video($options = []) static 视频操作
 * @method \KeFu\Data Data($options = []) static 数据开放服务
 */
class Ks
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
        $class = "\\KeFu\\{$name}";

        if (!empty($class) && class_exists($class)) {
            $option = array_shift($arguments);
            $config = is_array($option) ? $option : self::$config->get();
            return new $class($config);
        }
    }

}

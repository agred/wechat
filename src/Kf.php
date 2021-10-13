<?php

use KeFu\Kernel\DataArray;

/**
 * Class Kf
 * @package KeFu
 *
 * @method \KeFu\Oauth Oauth($options = []) static 授权凭证
 * @method \KeFu\Account Account($options = []) static 用户操作
 * @method \KeFu\Event Event($options = []) static 客服消息
 * @method \KeFu\Media Media($options = []) static 素材管理
 * @method \KeFu\Other Other($options = []) static 其他信息
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
        $class = "\\KeFu\\{$name}";

        if (!empty($class) && class_exists($class)) {
            $option = array_shift($arguments);
            $config = is_array($option) ? $option : self::$config->get();
            return new $class($config);
        }
    }

}

<?php

use Request\Kernel\DataArray;

/**
 * Class Third
 * @package Request
 *
 * @method static Request\Third\Oauth Oauth($options = []) 授权与Token
 * @method static Request\Third\Api Api($options = []) Api管理
 * @method static Request\Third\Privacy Privacy($options = []) 小程序用户隐私保护指引
 * @method static Request\Third\Domain Domain($options = []) 域名管理
 * @method static Request\Third\Template Template($options = []) 小程序模板管理
 * @method static Request\Third\Code Code($options = []) 小程序代码管理
 */
class Third
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
        $class = "\\Request\\Third\\{$name}";

        if (!empty($class) && class_exists($class)) {
            $option = array_shift($arguments);
            $config = is_array($option) ? $option : self::$config->get();
            return new $class($config);
        }
    }
}

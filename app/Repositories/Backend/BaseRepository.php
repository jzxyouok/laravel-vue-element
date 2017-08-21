<?php
namespace App\Repositorys\Backend;

use App\Models\Dict;

abstract class BaseRepository
{
    protected static $instance;
    protected $result  = [];
    protected $dicts  = [];
    protected $status  = 0;
    protected $message = '';

    //获取实例化
    public static function getInstance()
    {
        $class = get_called_class();
        if (!isset(self::$instance[$class])) {
            self::$instance[$class] = new $class;
        }
        return self::$instance[$class];
    }

    /**
     * 获取字典
     */
    public function getDicts($code_arr)
    {
        $result = [];
        if (arrayAndNotEmpty($code_arr)) {
            $lists = Dict::whereIn('code', $code_arr)->get();
            foreach ($code_arr as $item) {
                $result[$item] = $lists->where('code', $item)->values()->toArray();
            }
        }
        return $result;
    }
}

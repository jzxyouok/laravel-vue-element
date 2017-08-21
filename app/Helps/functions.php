<?php 

/**
 * 判断变量是否存在
 * @return $obj;
 */
function issetAndNotEmpty($obj)
{
    return (isset($obj) && !empty($obj)) ? $obj : false;
}
/**
 * 判断数组是否存在
 * @return $obj;
 */
function arrayAndNotEmpty($arr)
{
    return (is_array($arr) && !empty($arr)) ? $arr : [];
}

/**
 * 判断变量是否存在
 */
function isTrueOrFalse($obj)
{
    return (isset($obj) && !empty($obj)) ? true : false;
}

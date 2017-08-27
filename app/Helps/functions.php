<?php

/**
 * 判断变量是否存在
 * @return $obj;
 */
function issetAndNotEmpty($obj)
{
    return (isset($obj) && !empty($obj) || $obj === 0) ? true : false;
}


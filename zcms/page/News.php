<?php
/**
 * Created by PhpStorm.
 * User: codywofford
 * Date: 3/5/17
 * Time: 6:53 PM
 */

namespace zcms\page;


use zcms\Setting;

class News
{

    /**
     * @return string
     */
    public static function getAll(): string
    {
        return Setting::getClanName();
    }

}
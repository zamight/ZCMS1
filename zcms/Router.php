<?php
/**
 * Created by PhpStorm.
 * User: codywofford
 * Date: 3/5/17
 * Time: 6:36 PM
 */

namespace zcms;

use zcms\page\Announcement;
use zcms\page\News;

class Router
{

    private static $htmlOutput;

    public static function clientToPage()
    {

        if (inputExists('clanname')) {
            Setting::setClanName(getInput('clanname'));
        } else {
            Setting::setClanName(Setting::DEFAULT_CLAN);
        }

        if (inputExists('page')) {
            Setting::setPage(getInput('page'));
        } else {
            Setting::setPage(Setting::DEFAULT_PAGE);
        }

        switch (Setting::getPage()) {
            case 'news':
                self::getNews();
                break;
        }
    }

    public static function getNews()
    {
        self::$htmlOutput = Announcement::getAll();
    }

    /**
     * @return mixed
     */
    public static function getHtmlOutput(): string
    {
        return self::$htmlOutput;
    }

    /**
     * @param mixed $htmlOutput
     */
    public static function setHtmlOutput(string $htmlOutput)
    {
        self::$htmlOutput = $htmlOutput;
    }


}

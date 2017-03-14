<?php
/**
 * Created by PhpStorm.
 * User: codywofford
 * Date: 3/5/17
 * Time: 6:36 PM
 */

namespace Zcms;

use zcms\page\Announcement;
use zcms\page\News;

class Router
{

    private static $htmlOutput = "";

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
     * Return the html output
     * @return mixed
     */
    public static function getHtmlOutput(): string
    {
        return self::$htmlOutput;
    }

    /**
     * Set the html output
     * @param mixed $htmlOutput
     */
    public static function setHtmlOutput(string $htmlOutput)
    {
        self::$htmlOutput = $htmlOutput;
    }

    /**
     * Append the html output
     * @param mixed $htmlOutput
     */
    public static function appendHtmlOutput(string $htmlOutput)
    {
        self::$htmlOutput .= $htmlOutput;
    }
}

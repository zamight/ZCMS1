<?php
/**
 * Created by PhpStorm.
 * User: codywofford
 * Date: 3/5/17
 * Time: 3:43 PM
 */

namespace Zcms;


class Setting
{

    const DB_HOST = 'localhost';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = 'root';
    const DB_DATABASE = 'zcms';
    const DB_PORT = 8889;
    const DEFAULT_CLAN = 'support';
    const DEFAULT_PAGE = 'announcement';

    private static $database;
    private static $user;
    private static $clanName;
    private static $page;
    private static $action;

    /**
     * Return the database.
     * The database must be set first.
     * @return DatabaseInterface
     */
    public static function getDatabase(): DatabaseInterface
    {
        return self::$database;
    }

    /**
     * Set the database to be used
     * @param DatabaseInterface $database
     */
    public static function setDatabase(DatabaseInterface $database)
    {
        self::$database = $database;
    }

    /**
     * Return the client user information
     * @return UserInterface
     */
    public static function getUser(): UserInterface
    {
        return self::$user;
    }

    /**
     * Set the clent user information
     * @param UserInterface $user
     */
    public static function setUser(UserInterface $user)
    {
        self::$user = $user;
    }

    /**
     * Get the clan name in use
     * @return string
     */
    public static function getClanName(): string
    {
        return self::$clanName;
    }

    /**
     * Set the clan name to be in use
     * @param string $clanName
     */
    public static function setClanName(string $clanName)
    {
        self::$clanName = $clanName;
    }

    /**
     * Get the page in use
     * @return string
     */
    public static function getPage(): string
    {
        return self::$page;
    }

    /**
     * Set the page to be in use
     * @param string $page
     */
    public static function setPage(string $page)
    {
        self::$page = $page;
    }

    /**
     * Get the action in use for the page
     * @return string
     */
    public static function getAction(): string
    {
        return self::$action;
    }

    /**
     * Set the action to be use by the page
     * @param string $action
     */
    public static function setAction(string $action)
    {
        self::$action = $action;
    }
}

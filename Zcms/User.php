<?php
/**
 * Created by PhpStorm.
 * User: codywofford
 * Date: 3/4/17
 * Time: 11:30 PM
 * PHP Version: 7.0.15
 */

declare(strict_types=1);

namespace Zcms;

class User implements UserInterface
{

    /**
     * @var
     */
    private $database;
    private $userInformation;

    /**
     * User constructor.
     * @param bool $uid
     */
    public function __construct($uid = false)
    {
        $userQuerySql = "SELECT * FROM `user` WHERE uid = ? LIMIT 1";

        // Set Database
        $this->database = Setting::getDatabase();

        // Get User
        $this->userInformation = $this->database->getRow($userQuerySql, [$uid]);
    }

    /**
     * @return bool
     */
    public function isLoggedIn(): bool
    {
        // TODO: Implement isLoggedIn() method.
    }

    /**
     * @return bool
     */
    public function isSuperAdmin(): bool
    {
        // TODO: Implement isSuperAdmin() method.
    }

    /**
     * @return bool
     */
    public function isMod(): bool
    {
        // TODO: Implement isMod() method.
    }

    /**
     * Return this displayname.
     * @return string
     */
    public function getDisplayName(): string
    {
        return $this->userInformation['display_name'];
    }

    /**
     * Return this username.
     * @return string
     */
    public function getUsername(): string
    {
        return $this->userInformation['username'];
    }

    /**
     * Returns this user ID. Requires this to be true.
     * @return int User ID.
     */
    public function getUid(): int
    {
        return (int) $this->userInformation['uid'];
    }

    /**
     * @param string $displayName
     * @return bool Return if successful.
     */
    public function setDisplayName(string $displayName): bool
    {
        $rowcount = $this->database->updateRow('user', ['display_name' => $displayName], ['uid' => $this->getUid()]);
        return $rowcount > 0;
    }

    /**
     * @param string $password Value of password to change to.
     * @return bool
     */
    public function setPassword(string $password): bool
    {
        // TODO: Implement setPassword() method.
        return false;
    }
}
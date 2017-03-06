<?php
/**
 * Created by PhpStorm.
 * User: codywofford
 * Date: 3/4/17
 * Time: 11:30 PM
 * PHP Version: 7.0.15
 */

declare(strict_types=1);

namespace zcms;

class User implements UserInterface
{

    /**
     * @var
     */
    private $database;

    /**
     * User constructor.
     * @param $database
     */
    public function __construct($database)
    {
        $this->database = $database;
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
     * @return string
     */
    public function getDisplayName(): string
    {
        // TODO: Implement getDisplayName() method.
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        // TODO: Implement getUsername() method.
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        // TODO: Implement getId() method.
    }

    /**
     * @param string $displayName
     * @return bool
     */
    public function setDisplayName(string $displayName): bool
    {
        // TODO: Implement setDisplayName() method.
    }

    /**
     * @param string $password
     * @return bool
     */
    public function setPassword(string $password): bool
    {
        // TODO: Implement setPassword() method.
    }
}
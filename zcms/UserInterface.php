<?php
/**
 * Created by PhpStorm.
 * User: codywofford
 * Date: 3/5/17
 * Time: 1:06 AM
 */

declare(strict_types=1);

namespace zcms;

interface UserInterface
{

    public function isLoggedIn(): bool;
    public function isSuperAdmin(): bool;
    public function isMod(): bool;
    public function getId(): int;
    public function getDisplayName(): string;
    public function getUsername(): string;
    public function setDisplayName(string $displayName): bool;
    public function setPassword(string $password): bool;
}

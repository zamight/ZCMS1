<?php
/**
 * Created by PhpStorm.
 * User: codywofford
 * Date: 3/4/17
 * Time: 11:34 PM
 */

declare(strict_types=1);

namespace zcms;

interface DatabaseInterface
{

    public function isConnected(): bool;
    public function getException(): string;

}
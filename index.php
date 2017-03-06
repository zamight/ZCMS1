<?php
/**
 * Multi-Clan Management Website.
 *
 * @author Cody Wofford
 * @version 1.0.0
 * @license TBD
 *
 * PHP Version 7.0.15
 */

declare(strict_types=1);

namespace zcms;

error_reporting(E_ALL);

// Automatically load necessary classes
function autoLoadClass($class_name)
{
    include __DIR__  . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $class_name) . '.php';
}
spl_autoload_register('zcms\autoLoadClass');

$database = new PDODB(
    Setting::DB_HOST,
    Setting::DB_USERNAME,
    Setting::DB_PASSWORD,
    Setting::DB_DATABASE,
    Setting::DB_PORT
);

if (!$database->isConnected()) {
    die($database->getException());
}

include __DIR__ . '/zcms/functions.php';

Setting::setDatabase($database);

$user = new User();
Setting::setUser($user);

Router::clientToPage();
echo Router::getHtmlOutput();

<?php
/**
 * Created by PhpStorm.
 * User: dex
 * Date: 2/28/17
 * Time: 3:05 PM
 */
session_start();
require_once __DIR__ . "/../vendor/autoload.php";

spl_autoload_register( function ($className) {
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    require $fileName;
});

$app = new Dex\Ginger\Controller\Api();


<?php

$basePath = '/parcial';

define('APP_NAME', 'City Farmac');
define('BASE_PATH', rtrim($basePath, '/'));

function url(string $path = ''): string {
    $path = ltrim($path, '/');
    return BASE_PATH . ($path === '' ? '/' : '/' . $path);
}

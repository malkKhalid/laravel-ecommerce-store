<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// 1. تعديل مسار صيانة التطبيق
if (file_exists($maintenance = __DIR__ . '/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// 2. تعديل مسار الـ Composer (vendor)
require __DIR__ . '/../vendor/autoload.php';

// 3. تعديل مسار الـ Bootstrap
(require_once __DIR__ . '/../bootstrap/app.php')
    ->handleRequest(Request::capture());
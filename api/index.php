<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// تحميل الملحقات
require __DIR__ . '/../vendor/autoload.php';

// تشغيل التطبيق
$app = require_once __DIR__ . '/../bootstrap/app.php';

// إجبار لارافيل على استخدام مجلد /tmp للتخزين (هذا أهم سطر)
$app->useStoragePath('/tmp/storage');

$app->handleRequest(Request::capture());
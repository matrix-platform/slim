<?php //>

$prefix = __DIR__;

define('APP_HOME', "{$prefix}/");
define('FILES_HOME', "{$prefix}/www/files/");
define('MATRIX', "{$prefix}/vendor/matrix-platform/core/");
define('VENDOR_HOME', "{$prefix}/vendor/");

require VENDOR_HOME . 'autoload.php';
require MATRIX . 'app.php';

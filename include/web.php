<?php //>

use Monolog\ErrorHandler;

if (strtolower(@$_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    define('AJAX', true);
}

define('REMOTE_ADDR', $_SERVER['REMOTE_ADDR']);

$path = PATH_INFO;
$method = $_SERVER['REQUEST_METHOD'];

ErrorHandler::register(logging('error'));

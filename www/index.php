<?php //>

use Slim\Factory\AppFactory;
use matrix\slim\Controller;

define('APP_HOME', dirname(__DIR__) . '/');
define('FILES_HOME', APP_HOME . 'www/files/');
define('MATRIX', APP_HOME . 'vendor/matrix-platform/core/');
define('VENDOR_HOME', APP_HOME . 'vendor/');

require VENDOR_HOME . 'autoload.php';

$app = AppFactory::create();
$app->addErrorMiddleware(true, true, true);
$app->setBasePath(dirname($_SERVER['SCRIPT_NAME']));
$app->any('{path:.*}', Controller::class);
$app->run();

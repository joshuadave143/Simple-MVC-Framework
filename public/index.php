<?php
require_once '../config/config.php';

if( ENVIRONMENT === 'development' ){
    ini_set('display_errors', 1); 
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}


/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| this application. We just need to utilize it! We'll simply require it
| into the script here so we don't need to manually load our classes.
|
*/
require ROOT_FOLDER.'/vendor/autoload.php';
// require_once __DIR__.'/orm/conf/config.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request using
| the application's HTTP request. Then, we will send the response back
| to this client's browser.
|
*/

use JDT\core\JDTFacade;

(new JDTFacade())->startApplication();
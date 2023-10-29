<?php
namespace JDT\routes;

use JDT\core\RouterBase;

class Api{
    public function __construct(RouterBase $router){
        $router->get('/test?{param}', 'TestController::index');
    }
}

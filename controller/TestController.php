<?php

namespace JDT\controller;
use JDT\core\HttpRequest;

use JDT\core\view;
use SimpleMVC\PostQuery;
class TestController{
    public function index(HttpRequest $request){
        
        // var_dump(PostQuery::create()
        //             ->find());
        return 'tes';
        // $view = new View('pdfLoadingPage');
        // $view->render();
    }
}
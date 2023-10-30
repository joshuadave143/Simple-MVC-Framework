<?php
namespace JDT\provider;

use JDT\core\RouterBase;
use JDT\routes\Web;
use JDT\routes\Api;

class RouterProvider extends RouterBase{
    public function __construct(){
        $this->group('/api',function($obj){
            new Api($obj);
        });

        $this->group('',function($obj){
            new Web($obj);
        });
       
        
        $this->dispatch();
    }
}
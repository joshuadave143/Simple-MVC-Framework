<?php
namespace JDT\config;

use JDT\routes\RouterProvider;
use Dotenv\Dotenv;
class app{
    public function start(){

        $dotenv = \Dotenv\Dotenv::createImmutable(ROOT_FOLDER);
        $dotenv->load();
        require_once ROOT_FOLDER.'/orm/conf/config.php';
        // start the session
        session_start();
        // init RouterProvider
        (new RouterProvider());
    }
}
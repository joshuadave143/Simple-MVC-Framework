<?php

namespace JDT\core;
use JDT\provider\RouterProvider;
use Dotenv\Dotenv;
class JDTFacade{
    public function startApplication(): void{
        $dotenv = Dotenv::createImmutable(ROOT_FOLDER);
        $dotenv->load();
        require_once ROOT_FOLDER.'/orm/conf/config.php';
        // start the session
        session_start();
        // init RouterProvider
        (new RouterProvider());
    }
}
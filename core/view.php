<?php
namespace JDT\core;

class View {
    protected $viewFile;
    
    public function __construct($viewFile) {
        $this->viewFile = __DIR__.'/../views/'.$viewFile.'.php';
    }
    
    public function render($data=[]) {
        // echo $this->viewFile;
        // return;
        ob_start(); // Start output buffering
        include $this->viewFile;
        $content = ob_get_clean(); // Get and clean the buffered content
        echo $content;
    }
}
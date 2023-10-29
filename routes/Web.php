<?php
namespace JDT\routes;

use JDT\core\RouterBase;

class Web{
    public function __construct(RouterBase $router){
        $router->get('/test', 'TestController::index');

        $router->get('/salesRalatedAnalysis?{param}', 'salesRalatedAnalysis\lostCustomerController::index');
        $router->get('/salesRalatedAnalysis/pdf?{param}', 'salesRalatedAnalysis\lostCustomerController::pdfGenerated');

        
        $router->get('/MasterFileList?{param}', 'masterFileListController::index');
        $router->get('/MasterFileList/pdf?{param}', 'masterFileListController::pdfGenerated');

        $router->get('/accountingReports?{param}', 'accountingReports\IntakeInvoiceController::index');
    }
}

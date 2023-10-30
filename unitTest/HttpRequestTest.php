<?php
require __DIR__.'/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class HttpRequestTest extends TestCase{
    public function test_instantiation_with_valid_arguments(){
        $this->expectException(\InvalidArgumentException::class);
        $arg = [
            "method"    => "GET", 
            "uri"       => "/example", 
            "query"     => ['param1' => 'value1', 'param2' => 'value2'], 
            "headers"   => ['Content-Type' => 'application/json']
        ];
        $http = new JDT\core\HttpRequest($arg );

        // $this->assertEquals($arg['uri'] , $http->uri());
        // $this->assertEquals($arg['method'], $http->method());
        // $this->assertEquals($arg['query'], $http->query());
        // $this->assertEquals($arg['headers'], $http->header('json'));
        // $this->assertEquals($arg['body'], $http->all());
    }
}
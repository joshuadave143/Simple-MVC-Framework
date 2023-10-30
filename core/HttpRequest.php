<?php
namespace JDT\core;

class HttpRequest {
    private $method;
    private $uri;
    private $query;
    private $headers;
    private $body;
    private $session;

    // public function __construct($method, $uri, $query, $headers, $body) {
    public function __construct(array $requestData) {
        $this->method = $requestData['method'];
        $this->uri = $requestData['uri'];
        $this->query = $requestData['query'];
        $this->headers = $requestData['headers'];
        $this->body = $requestData['body'];
    }

    public function method(): string {
        return $this->method;
    }

    public function uri(): string  {
        return $this->uri;
    }

    public function query(): array {
        return $this->query;
    }

    public function header($header):array {
        return array_key_exists($header, $this->headers) ? $this->headers[$header] : null;
    }

    public function all(): array {
        return $this->body;
    }

    public function input($key) : string {
        return isset($this->body[$key]) ? $this->body[$key] : null;
    }

    public function session($key){
        return $_SESSION[$key];
    }

    // Add more methods as needed for file uploads, validation, etc.
}

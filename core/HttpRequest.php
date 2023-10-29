<?php
namespace JDT\core;

class HttpRequest {
    private $method;
    private $uri;
    private $query;
    private $headers;
    private $body;
    private $session;

    public function __construct($method, $uri, $query, $headers, $body) {
        $this->method = $method;
        $this->uri = $uri;
        $this->query = $query;
        $this->headers = $headers;
        $this->body = $body;
    }

    public function method() {
        return $this->method;
    }

    public function uri() {
        return $this->uri;
    }

    public function query() {
        return $this->query;
    }

    public function header($header) {
        return isset($this->headers[$header]) ? $this->headers[$header] : null;
    }

    public function all() {
        return $this->body;
    }

    public function input($key) {
        return $this->body[$key];
    }

    public function session($key){
        return $_SESSION[$key];
    }

    // Add more methods as needed for file uploads, validation, etc.
}

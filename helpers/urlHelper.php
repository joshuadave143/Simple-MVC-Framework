<?php
namespace helpers;

class urlHelper{

    public $uri;
    public $url;
    public $host;

    public function uri() : string {
        $this->uri = $_SERVER['REQUEST_URI'];
        return $this->uri;
    }

    public function host() : string {
        $this->host = $this->protocol().$_SERVER['HTTP_HOST'];
        return $this->host;
    }

    public function protocol() : string {
        return ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    }

    public function url() : string {
        $this->url = $this->protocol().$this->host().$this->uri(); 
        return $this->url;
    }
}

?>
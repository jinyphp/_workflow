<?php

namespace Jiny\Http;

class Request
{
    private $headers;
    private $body;

    public function __construct()
    {
        // 해더정보
        $this->headers = $_SERVER;

        // 바디정보
        $handler = fopen('php://input', 'r');
        $this->body = stream_get_contents($handler);



        // echo __CLASS__."\n";
        // ob_start();

        // Response 객체를 생성함
        // $this->Response = new \Jiny\Http\Response($this);

        /*
        register_shutdown_function(array($this->Response, 'finish'));
        */

        // Request 해더 정보를 읽어 옵니다.
        /*
        $this->getHeader();

        // Request Body를 읽음
        if ($this->_headers['HTTP_CONTENT_TYPE'] == 'application/json') {
            $handler = fopen('php://input', 'r');
            $this->_request = stream_get_contents($handler);
        }
        */
    }

    public function type()
    {
        //return $this->headers['HTTP_CONTENT_TYPE'];
    }

    public function body()
    {
        return $this->body;
    }

    public function method()
    {
        // 대문자로 표기
        return strtoupper($_SERVER['REQUEST_METHOD']);
    }

}
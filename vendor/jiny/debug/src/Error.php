<?php
namespace Jiny\Debug;

class Error
{
    private $message;
    public function __construct($msg)
    {
        $this->message = $msg;
    }

    public function main()
    {
        return $this->message;
    }
}
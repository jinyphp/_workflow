<?php

namespace App\Controllers\Members;

class Mypage
{
    public function __construct()
    {
        echo __CLASS__;
    }

    public function main()
    {
        $http = \jiny\http();
        return $http->callback($this);
    }

    public function GET()
    {
        // GET 동작
        $file = "../resource/mypage.html";
        $body =  \jiny\html_get_contents($file, $vars);
        return $body;
    }

    /**
     * 
     */
}
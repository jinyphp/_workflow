<?php

namespace App\Controllers;

class Forms
{

    public function __construct()
    {

    }

    public function main()
    {
        echo "폼 자동생성 테스트";
        $conf = \json_decode(\file_get_contents("..".DIRECTORY_SEPARATOR.__CLASS__.".json"),true);
        \jiny\htmlForm($conf);
        $body = \jiny\htmlFormBody();
        return $body;
    }
}
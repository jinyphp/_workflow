<?php

namespace App\Controllers\Members;
/**
 * 패스워드 찾기
 */
class Password
{
    public function __construct()
    {

    }

    public function main()
    {
        $http = \jiny\http();
        return $http->callback($this);
    }

    public function GET()
    {
        // GET 동작
        $body = file_get_contents("../resource/password.html");
        return $body;
    }

    public function POST()
    {

    }

}

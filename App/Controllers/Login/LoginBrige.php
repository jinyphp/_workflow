<?php

namespace App\Controllers\Login;
/**
 * 회원관리 Brige
 */
class LoginBrige extends \Jiny\Members\Login
{
    private $site;
    public function __construct()
    {
        // $this->setting();
        parent::__construct();

        $str = \file_get_contents("../config/site.json");
        $this->site = \json_decode($str);
    }

    public function main()
    {
        // 상위기능
        $this->resource = "../resource/members/login.html.php";
        $body = parent::main();
        
        $name = $this->site->theme; 
        $Theme = \jiny\theme()->setName($name)->setPath();
        $layout = $Theme->layout("empty.html");

        return \jiny\theme([
            'content'=>$body
        ]);
    }
}
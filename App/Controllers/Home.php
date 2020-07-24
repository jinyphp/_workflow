<?php

namespace App\Controllers;

class Home
{
    private $Auth;
    public function __construct()
    {
        // echo __CLASS__."<br>";
        $this->Auth = new \Jiny\Members\Auth($this);
    }

    public function main()
    {
        if($this->Auth->status()) {
            $body = file_get_contents("../resource/home.html");
            return $body;
        } else {
            echo "로그인이 필요 합니다. 홈 화면입니다.";
            echo "<a href='/login'>Login</a>";
        }
        
        
    }
}
<?php

namespace App\Controllers;

class Home extends \Jiny\App\Builder
{
    private $Auth;
    public function __construct()
    {
        //$this->init($this);
        $this->Auth = new \Jiny\Members\Auth($this);
    }

    public function main($param=[])
    {
        if( $this->Auth->status()) {
            $body = $this->statusLogin();
        } else {
            $body = $this->statusLogout();
        }

        // 테마설정 변경
        //\jiny\theme()->layout("empty.html")->load(['title'=>"Workflow",'logo'=>"work"]);
        return $body;
    }

    private function statusLogin()
    {
        return \file_get_contents("../resource/home_login.html");
    }

    private function statusLogout()
    {
        return \file_get_contents("../resource/home_logout.html");
    }

    public function POST($param=[])
    {
        //echo __METHOD__;
        //echo "호출이 되었습니다.";
    }

    public function PUT($param=[])
    {
        //echo __METHOD__;
        //echo "호출이 되었습니다.";
    }

}
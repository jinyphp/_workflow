<?php

namespace App\Controllers;

class Home extends \Jiny\App\Builder
{
    private $Auth;
 
    public function __construct()
    {
        $this->init($this);
        $this->Auth = new \Jiny\Members\Auth($this);
    }

    public function main($param=[])
    {
        if( $this->Auth->status()) {
            $body = \file_get_contents("../resource/home_login.html");
        } else {
            $body = \file_get_contents("../resource/home_logout.html");
        }

        
 
        // 테마출력
        $name = "jindalrae/basic";
        $Theme = \jiny\theme()->setName($name)->setPath();
        $Theme->layout()->load(['title'=>"진달래꽃",'logo'=>"Jindalrae"]);

        return \jiny\theme([
            'header'=>$Theme->header()->load(),
            'content'=>$body
        ]);

    }

    public function POST($param=[])
    {
        echo __METHOD__;
        echo "호출이 되었습니다.";
    }

    
    public function PUT($param=[])
    {
        echo __METHOD__;
        echo "호출이 되었습니다.";
    }

}
<?php

namespace App\Controllers\Login;

class MypageBrige extends \Jiny\Members\Mypage
{

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
        $body = parent::main();

        // 기능추가
        // 테마출력
        //$name = "jindalrae/admin";
        $name = $this->site->theme; 
        $Theme = \jiny\theme()->setName($name)->setPath();
        $Theme->layout()->load(['title'=>"진달래꽃"]);
        $header = $Theme->header()->load(['logo'=>"진달래꽃"]);
        $footer = $Theme->footer()->load();
        return \jiny\theme([
            'content'=>$body,
            'header'=>$header,
            'nav'=>"",
            'footer'=>$footer
        ]);
    }
}
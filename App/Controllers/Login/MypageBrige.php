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

        return $this->output($body);
    }

    private function output($body)
    {
        // 테마출력
        // $name = "startbootstrap/sbadmin";
        $name = "jiny/layout30";
        $Theme = \jiny\theme()->setName($name)->setPath();
        $Theme->layout("index.html")->load(['title'=>"진달래꽃",'logo'=>"Jindalrae"]);

        $Menu = \jiny\menu()->json();
        $m = $Menu->html()->ul();

        return \jiny\theme([
            'content'=>$body,
            'sidebar' => $Theme->resource("accordion.html"),
            'header' => $Theme->resource("header.html"),
        ]);
    }

}
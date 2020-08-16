<?php

namespace App\Controllers\Members;
/**
 * 회원관리 Brige
 */
class MembersProxy extends \Jiny\App\Controller
{
    private $Members;
    public function __construct()
    {
        $this->Members = new \Jiny\Members\Admin\Members($this);
        $conf = $this->Members->confPath(); // 패키지 기본설정
        $this->Members->init()->setEnv($conf);
    }

    public function main($params=[])
    {
        $body = $this->Members->main($params);
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
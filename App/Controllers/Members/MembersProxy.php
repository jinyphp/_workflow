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
        $this->conf($this->Members->confpath);
        $this->Members->setConf($this->conf);

        // 게시판 쿠키초기화
        $this->Members->init();
    }

    public function main($params=[])
    {
        $method = \jiny\http\request()->method();
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
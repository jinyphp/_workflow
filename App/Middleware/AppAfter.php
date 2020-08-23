<?php

namespace App\Middleware;
/**
 * 사용자 미들웨어 After
 */
class AppAfter extends \Jiny\App\MiddleWare\Chain
{
    public function __construct()
    {
        //echo __CLASS__."<br>";
    }

    /**
     * 컨트롤러 호출후 실행동작.
     */

    public function execute($req, $res)
    {
        if(is_string($res->body)) {
            $this->theme($req, $res);
        } else {
            $res->body = json_encode($res->body,JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
        }

        // next chain
        return $this->Next->execute($req, $res);
    }

    private function theme($req, $res)
    {
        // 테마 레이아웃 결합
        $Theme = \jiny\theme();
        $Theme->layout("index.html")->load(['title'=>"진달래꽃",'logo'=>"Jindalrae"]);

        $Menu = \jiny\menu()->json();
        $m = $Menu->html()->ul();

        // $res->body = \jiny\theme($res->body);

        $res->body = \jiny\theme([
            'content'=>$res->body
        ]);
        

    }
}
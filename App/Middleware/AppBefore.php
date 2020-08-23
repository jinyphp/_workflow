<?php

namespace App\Middleware;
/**
 * 사용자 미들웨어 before
 */
class AppBefore extends \Jiny\App\MiddleWare\Chain
{
    public function __construct()
    {
        //echo __CLASS__."<br>";
    }

    /**
     * 컨트롤러 호출전 실행동작.
     */
    public function execute($req, $res)
    {
        // 테마설정
        
        $name = "bootstrap/basic";
        $Theme = \jiny\theme()->setName($name)->setPath();
        

        // next chain
        return $this->Next->execute($req, $res);
    }

    // 미들웨어 인증여부 체크시 
    // 메소드 호출
    public function isAuth()
    {
        if(!isset($_SESSION['login']) ) {
            //post redirect get pattern
            header("HTTP/1.1 301 Moved Permanently");
            header("location:"."/login");
            echo "인증필요";
        }

        // echo "인증성공";
        return true;
    }

}
<?php

namespace App\Controllers\Members;
/**
 * 회원 약관동의
 */
class Agree
{
    private $Auth;
    public $nextURL = "/regist/form";
    public function __construct()
    {
        $this->Auth = new \Jiny\Members\Auth($this);
    }

    public function main()
    {
        if($this->Auth->status()) {
            echo "로그아웃 상태에서만 회원가입이 가능합니다.";
        } else {
            $http = \jiny\http();
            $method = $http->Request->method();
            return $this->$method();
        }        
    }

    private function GET()
    {
        // GET 동작
        $body = file_get_contents("../resource/members/agree.html");
        return $body;
    }

    private function POST()
    {
        $data = \jiny\formData();
        print_r($data);
        /*
        foreach($_POST['data'] as $key => $value) {
            if($value) {
                setcookie("input_".$key, $value, time()+60*10,"/"); //10분유지
            } else {
                setcookie("input_".$key, "", time()-60*10); //10분유지
            }
        }*/

        //exit
        // 이전페이지
        // header('Location: ' . $_SERVER['HTTP_REFERER']);

        // post redirect get pattern
        /*
        $redirect = "/regist/form";
        header("HTTP/1.1 301 Moved Permanently");
        header("location:".$this->nextURL);
        */
        
    }

}

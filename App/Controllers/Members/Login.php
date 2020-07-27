<?php

namespace App\Controllers\Members;

class Login
{
    private $db;
    private $Auth;
    public $conf;
    public function __construct()
    {
        // 미들웨어
        $this->Auth = new \Jiny\Members\Auth($this);
        $this->conf = \json_decode(\file_get_contents("../Config/Login.json"));
    }

    /**
     * 기본 시작main
     */
    public function main()
    {
        if($this->Auth->status()) {
            // 로그인 상태
            return $this->mypage();

        } else {
            // 인증 요청
            $http = \jiny\http();
            return $http->callback($this);
        }
    }

    /**
     * 로그인상태
     * 페이지 이동
     */
    public function mypage()
    {
        $page = "/mypage";
        echo "마이페이지";
        // post redirect get pattern
        header("HTTP/1.1 301 Moved Permanently");
        header("location:".$page);
    }

    public function GET($vars=[])
    {
        // GET 동작
        $file = "../resource/login.html";
        $body =  \jiny\html_get_contents($file, $vars);

        // $Google = new \Jiny\Members\Google($this->conf);
        // $body = str_replace("{{google-login}}",$Google->button(),$body);

        // $Naver = new \Jiny\Members\Naver($this->conf);
        // $body = str_replace("{{naver-login}}",$Naver->button(),$body);

        return $body;
    }

    public function POST()
    {
        // echo "로그인 검증";
        $data = \jiny\formData();
        // print_r($data);
        
        if ($data['email'] && $data['password']) {
            $status = $this->Auth->signin($data['email'], $data['password']);
            if($status) {
                // echo "로그인 성공";
                return $this->mypage();
            } else {
                echo $this->Auth->message;
            }         
        }

        if(!$data['email']) {
            $vars['error']['email'] = "이메일이 입력되지 않았습니다.";
        }

        if(!$data['password']) {
            $vars['error']['password'] = "패스워드가 입력되지 않았습니다.";
        }

        return $this->GET($vars);
    }

    /**
     * 
     */
}
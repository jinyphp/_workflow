<?php

namespace App\Controllers;

class Registration
{
    private $uri = "/regist";
    public function __construct()
    {
        // $dbinfo = \jiny\dbinfo();
        // $this->db = \jiny\mysql($dbinfo);
    }

    public function main($params=null)
    {
        $Auth = new \Jiny\Members\Auth($this);
        if($Auth->status()) {
            // echo "로그아웃 상태에서만 회원가입이 가능합니다.";
            // post redirect get pattern
            header("HTTP/1.1 301 Moved Permanently");
            header("location:".$this->conf->mypage->uri); 
        } else {
            // 메서드 콜백호출
            $http = \jiny\http();
            return $http->callback($this);
        }
    }

    public function GET()
    {
        print_r($_SERVER);
        $file = "../resource/regist.html";
        $body = \jiny\html_get_contents($file, $args);
        return $body;
    }

    public function POST()
    {
        if($_POST['mode']=="newup") {
            return $this->registration();

        } else {
            /*
            // post redirect get pattern
            header("HTTP/1.1 301 Moved Permanently");
            header("location:".$this->$uri);
            */
        }
    }


    private function registration()
    {
        $db = new \Jiny\Members\Database();
        // 유효성 검사
        // $data =\jiny\formData();
        $data = $_POST['data'];
        if ($this->validation($data)) {
            //인증토큰
            $data['token'] = \hash("sha256", $data['email'].date("Y-m-d H:i:s"));
            if($result = $db->newUser($data)) {
                $mail = new \Jiny\Members\Mail();
                if ($mail->send($data)) {
                    $file = "../resource/members/registration_mail.html";
                    $body = \jiny\html_get_contents($file);
                    return $body;
                }
                return "회원가입 성공";
            } else {
                // return "중복된 회원입니다.";
                /*
                // post redirect get pattern
                header("HTTP/1.1 301 Moved Permanently");
                header("location:"."/regist/error");
                */

                $file = "../resource/members/registration_error.html";
                $body = \jiny\html_get_contents($file, $_POST['data']);
                echo $body; // ajax 결과로 출력
                exit;
                
            }

        } else {
            echo "유효한 입력 데이터가 아닙니다.";
            exit;
        }
        
        

    }

    private function validation($data)
    {
        if (filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false) {
            $msg = " 유효하지 않는 이메일 타입입니다.";
            return false;
        }

        if (filter_var($data['password'], FILTER_SANITIZE_STRING)) {
            $msg = "패스워드로 적합하지 않는 문자가 섞여 있습니다.";
            return false;
        }    

        return true;
    }





}
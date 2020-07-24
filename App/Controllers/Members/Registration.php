<?php
namespace App\Controllers\Members;

/**
 * 회원가입 처리
 */
class Registration
{
    private $Auth;
    private $db;
    public $nextURL = "/";
    public function __construct()
    {
        $dbinfo = \jiny\dbinfo();
        $this->db = \jiny\mysql($dbinfo);
        $this->Auth = new \Jiny\Members\Auth($this);
    }

    public function main($params=null)
    {
        if($this->Auth->status()) {
            echo "로그아웃 상태에서만 회원가입이 가능합니다.";
        } else {
            if ($this->check()) {
                $http = \jiny\http();
                return $http->callback($this);
            }
        }
    }

    public function check()
    {
        $data = \jiny\formData();
        if(isset($data['agree1']) && isset($data['agree2'])) {
            return true;
        } else {
            // 이전페이지
            echo "동의가 필요합니다.";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }


    public function GET()
    {
        // GET 동작
        $body = file_get_contents("../resource/regist.html");
        return $body;
    }


    public function POST()
    {
        // POST 동작
        /*
        echo "등록";
        // 유효성체크
        foreach(\jiny\formData() as $key => $value) {
            echo $key." ".$value."<br>";
        }
        */

        $data =\jiny\formData();
        if(isset($data['email']) && isset($data['password'])) {
            $PassWord = new Password();
            $data['password'] = $PassWord->encryption($data['password']);
            // print_r($data);
            $insert = $this->db->insert("members", $data);
            if ($id = $insert->save()) {
                echo "데이터 삽입 성공 = ".$id;
            } else {
                echo "데이터 삽입 실패";
            }
            // exit;

            // post redirect get pattern
            header("HTTP/1.1 301 Moved Permanently");
            header("location:".$this->nextURL);
        } else {
            // 재입력 요청
            $body = file_get_contents("../resource/regist.html");
            return $body;
        }
        
    }


}
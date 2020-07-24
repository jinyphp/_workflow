<?php

namespace App\Controllers\Members;
/**
 * 회원
 */
class Members
{
    private $db;
    private $csrf;
    private $setting;
    public function __construct()
    {
        //echo __CLASS__;
        $dbinfo = \jiny\dbinfo();
        $this->db = \jiny\mysql($dbinfo);
        $this->csrf = "hello";

        \session_start();

        // 외부 설정값
        $this->setting = \json_decode(\file_get_contents("..".DIRECTORY_SEPARATOR.__CLASS__.".json"),true);
        print_r($this->setting);
    }



    public function main()
    {
        //echo "회원관리";
        $http = \jiny\http();
        $method = $http->Request->method();
        return $this->$method();
    }

    private function GET()
    {
        $http = \jiny\http();
        $id = $http->Endpoint->last();
        if(is_numeric($id)) {
            return $this->getView($id);
        } else {
            return $this->getList();
        }
    }

    private function getList()
    {
        // board builder
        // $lists = new \Jiny\Board\Lists($this->setting);
        // return $lists->build();



        $rows = $this->db->select("members")->runAssocAll();
        //print_r($rows);
        $Html = new \Jiny\Html\Table($rows);

        $field = ['id'=>"번호",'firstname'=>"성명",'email'=>"이메일"];

        $Html->displayfield($field)->theadTitle($field);
        $Html->setHref("id","/members");
        // 연결링크
        $Html->setHref("email","{id}");
        $Html->setHref("email",["script","javascript:edit({id});"]);

        $data = [];
        $data['list'] = $Html->build();

        $csrf = \jiny\html\csrf($this->csrf);
        $body = \jiny\html_get_contents("../resource/members.html", $vars=['csrf'=>$csrf, 'mode'=>'list', 'data'=>$data ]);
        
        $body .= "";
        return $body;
    }

    private function getview($id)
    {
        $data = $this->db->select("members")->id($id);
        print_r($data);
    }

    private function getEdit($id)
    {
        echo "데이터를 수정합니다.<br>";
        if (\jiny\html\isCsrf()) {
            $data = $this->db->select("members")->id($id);
            print_r($data);

            $csrf = \jiny\html\csrf($this->csrf);
            $body = \jiny\html_get_contents("../resource/members_edit.html", $vars=['csrf'=>$csrf, 'mode'=>'editup', 'data'=>$data ]);
        
            // hidden: id추가
            $body = str_replace("</form>","<input type='hidden' name='id' value='$id'>"."</form>",$body);
            // $body = (new \Jiny\Html\Forms\Hidden("mode","editup"))->add($body);
            return $body;

        } else {
            echo "CSRF 불일치";
        }
    }

    private function POST()
    {
        echo "POST";
        print_r($_POST);
        if ($_POST['mode'] == "newup") {
            // 삽입
            // $update = $this->db->insert("board",$_POST['data'])->save();
            // $url = "/".$this->endpoint->first()."/";
        } else if ($_POST['mode'] == "edit") {
            $id = $_POST['id'];
            return $this->getEdit($id);
        } else if ($_POST['mode'] == "editup") {
            // 수정
            echo "데이터를 수정합니다.";
            if (\jiny\html\isCsrf()) {
                // id 선택값
                $id = isset($_POST['id'])?intval($_POST['id']) : 0;

                // 데이터삽입
                echo "--editup<br>";
                $data = \jiny\formData();
                print_r($data);

                // --- 패스워드 처리 ---
                if(isset($data['password']) && empty($data['password'])) {
                    // password가 비어있는 경우, update 항목 삭제
                    unset($data['password']);
                } else {
                    // 패스워드 암호화
                    $PassWord = new \Jiny\Members\Password();
                    $data['password'] = $PassWord->encryption($data['password']);
                }


                $update = $this->db->update("members",$data)->id($id);


                
            } else {
                echo "csrf 불일치";
            }

        } else if ($_POST['mode'] == "delete") {
            // 삭제
        }
    }

    private function postUpdate()
    {

    }

    private function postDelete()
    {

    }
}
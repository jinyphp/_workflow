<?php

namespace App\Controllers\Login;
/**
 * 회원관리 Brige
 */
class RegistBrige extends \Jiny\Members\Regist
{

    public function __construct()
    {
        // $this->setting();
        parent::__construct();
    }

    public function main()
    {
        // 상위기능
        $body = parent::main();

        // 기능추가
        // 테마출력
        $name = "jindalrae/admin";
        $Theme = \jiny\theme()->setName($name)->setPath();
        return \jiny\theme([
            'content'=>$body
        ]);
    }
}
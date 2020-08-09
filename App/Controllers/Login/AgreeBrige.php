<?php

namespace App\Controllers\Login;
/**
 * 회원관리 Brige
 */
class AgreeBrige extends \Jiny\Members\Agree
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
        $name = "jindalrae/basic";
        $Theme = \jiny\theme()->setName($name)->setPath();
        return \jiny\theme([
            'content'=>$body
        ]);
    }
}
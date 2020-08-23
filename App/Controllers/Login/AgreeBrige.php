<?php

namespace App\Controllers\Login;
/**
 * 회원관리 Brige
 */
class AgreeBrige extends \Jiny\Members\Agree
{

    public function __construct()
    {
        // parent::__construct();
    }

    public function main()
    {
        // $body = parent::main();

        $body = file_get_contents("../resource/regist.html");
        return $body;
    }


}
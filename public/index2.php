<?php
$autoload = require "../vendor/autoload.php";
// session_start();
\jiny\session_start();

$Boot = \jiny\core\boot();
if ($Boot instanceof \Jiny\Core\API) {
    //echo "API 동작";
    echo $Boot->main();
} else {
    //echo "일반동작";
    echo $Boot->main();

    // 컨트롤러 직접 실행방법
    // $boot->controller("membersRegist");

    // 컴포저 패키지 실행
    // $boot->package("\Jiny\Members\Registration");
    // echo $boot->package("\Jiny\Members\Login");
}






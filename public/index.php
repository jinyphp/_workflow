<?php
$autoload = require "../vendor/autoload.php";
\jiny\session_start();

$start = \jiny\core\bootstart();
echo $start->main();

// 컨트롤러 직접 실행방법
// $boot->controller("membersRegist");

// 컴포저 패키지 실행
// $boot->package("\Jiny\Members\Registration");
// echo $boot->package("\Jiny\Members\Login");







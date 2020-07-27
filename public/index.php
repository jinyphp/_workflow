<?php
require "../vendor/autoload.php";
// session_start();
\jiny\session_start();


$boot = \jiny\boot();

// 컨트롤러 직접 실행방법
// $boot->controller("membersRegist");

// 컴포저 패키지 실행
// $boot->package("\Jiny\Members\Registration");
// echo $boot->package("\Jiny\Members\Login");

echo $boot->route();

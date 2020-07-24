<?php
// 오토로딩
$autoload = "../vendor/autoload.php";
require $autoload;

// 데이터베이스 초기화
$dbinfo = \jiny\dbinfo();
if( !$db = new \Jiny\Mysql\Connection($dbinfo)) {
    // echo "데이터 접속 실패. 상위폴더의 dbinfo.php 파일의 설정내용을 확인해 주세요.\n";
}

// echo "데이터베이스 접속 성공\n";
/*
new Modules\Sessions($db->conn());
// new Modules\Sessions();
session_start();
// session_destroy();
*/

\jiny\session_start($db->conn());



$_SESSION['name']="hojin";
$_SESSION['password']="1234678";
if ( $_SESSION['password'] == "1234678") {
    echo " <br> 로그인 성공";
} else {
    echo " <br> 로그린 fail";
}

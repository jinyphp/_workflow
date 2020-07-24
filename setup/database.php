<?php
// 오토로딩
$autoload = "../vendor/autoload.php";
if(!file_exists($autoload)) {
    echo "composer autoload가 설치되어 있지 않습니다.\n";
    exit;
} 
require $autoload;

// 데이터베이스 초기화
$dbinfo = \jiny\dbinfo();
if( !$db = new \Jiny\Mysql\Connection($dbinfo)) {
    echo "데이터 접속 실패. 상위폴더의 dbinfo.php 파일의 설정내용을 확인해 주세요.\n";
}

echo "데이터베이스 접속 성공\n";
/*
// 회원 테이블 생성
$result = $db->table("members")->create([
    'firstname' => "varchar(50)",
    'lastname' => "varchar(100)",
    'data' => "text",
    'last_accessed' => "timestamp"
]);
if (is_object($result)) {
    echo "members 테이블 생성 성공";
} else {
    echo "members ".$result."\n";
    exit;
}


$result = $db->table("authors")->create();
if (is_object($result)) {
    echo "테이블 생성 성공";
} else {
    echo "authors ".$result."\n";
    // exit;
}
*/

// session 테이블 생성
$result = $db->table("session")->create([
    'data' => "text",
    'last_accessed' => "timestamp"
]);
if (is_object($result)) {
    echo "members 테이블 생성 성공";
} else {
    echo "members ".$result."\n";
    exit;
}



/*
$query = "CREATE TABLE `".$dbinfo['schema']."`.`members1` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    primary key(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

$db->query($query); 
*/

// 테이블 목록출력
//print_r($db->table()->list());
<?php
// 오토로딩
$autoload = "../vendor/autoload.php";
require $autoload;

// 데이터베이스 초기화
$dbinfo = \jiny\dbinfo();
if( !$db = \jiny\mysql($dbinfo)) {
    // echo "데이터 접속 실패. \n";
    // echo "상위폴더의 dbinfo.php 파일의 설정내용을 확인해 주세요.\n";
}

\jiny\mysql();


// $members = new \Jiny\Members\Database($db);

// $rows = $members->id(1);

// raw select 쿼리
/*
$select = $db->select("SELECT * from members");
echo $db->getQuery();
$rows = $select->run()->fetchObjAll();
print_r($rows);
*/

// raw select 바인드 하기
/*
$select = $db->select("SELECT * FROM members WHERE id=:id");
// $rows = $select->run(['id'=>1])->fetchObjAll();
$rows = $select->runObjAll(['id'=>1]);
print_r($rows);
*/


// 쿼리 빌드
/*
$select = $db->select("members",["id","firstname","lastname"])->build();
echo $select->getQuery();
$rows = $select->runObjAll();
print_r($rows);
*/


// $rows = $db->select("members",["id","firstname"])->where(['id'])->runObjAll(['id'=>"1"]);

// $rows = $db->select("members",["id","firstname"])->where("id>=:id")->runObjAll(['id'=>"1"]);

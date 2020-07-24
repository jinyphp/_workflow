<?php

// 오토로딩
$autoload = "../vendor/autoload.php";
require $autoload;

$boot = \jiny\boot();
$boot->controller("membersRegist");


<?php
$Autoload = require "../vendor/autoload.php";
$Sess = \jiny\session_start();

$row = scandir("../resource");
print_r($row);
$body = file_get_contents("../resource/home_login.html");
echo "<textarea>".$body."</textarea>";
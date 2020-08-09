<?php
$Autoload = require "../vendor/autoload.php";
$Sess = \jiny\session_start();

$name = isset($_GET['layout'])? str_replace("-","/",$_GET['layout']) : "jiny/layout1";
// $Theme = new \Jiny\Theme\Theme($name);
$Theme = \jiny\theme()->setName($name)->setPath();
$header = $Theme->header()->load();
$footer = $Theme->footer()->load();
$nav = $Theme->nav()->load();
echo \jiny\theme([
    'header'=>$header,
    'site'=>"aaaa",
    'function'=>"어드민메뉴",
    'setting'=>"설정",
    'footer'=>$footer,
    'nav'=>$nav
    ]);

<?php

function session($db=null)
{
    new Modules\Sessions($db);
    session_start();
}

function isPackage($name)
{
    $file = file_get_contents("../composer.json");
    $json = json_decode($file);
    if(key_exists($name,$json->require));
}
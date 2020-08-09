<?php

// 설정파일 적용
$path = "./conf/Serve.json";
if (file_exists($path)) {
    $file = file_get_contents($path);
    $conf = json_decode($file,true);
} else {
    $conf = [
        'port'=>"8000",
        'path'=>"./public"
    ];
}


echo "jinyPHP Development Server started at ".date("Y-m-d H:i:s")." \n";
echo "Listening on http://localhost:".$conf['port']." \n";
echo "Document root is ".$conf['path']." \n";
echo "Press Ctrl-C to quit. \n";

passthru("php -S localhost:".$conf['port']." -t ".$conf['path']." ", $status);

<?php
$Autoload = require "../vendor/autoload.php";

$menudata = new \Jiny\Menu\Data("../data/menu/nav.json");
printbr($menudata->get());



// $data = \jiny\json_get_array("../data/menu/menu.json");
// $html = new \Jiny\Html\Htmllist($data);

// li 동일한 클래스 지정
// echo $html->ul(['ul'=>"menu", 'li'=>"sub" ]);

// li별 서로다른 클래스 지정, 배열요소 전달
// echo $html->ul(['ul'=>"menu", 'li'=>["sub-1","sub-2","sub-3","sub-4","sub-5"] ]);

// li별 순차별 지정, 빈 배열 지정
// echo $html->ul(['ul'=>"menu", 'li'=>[] ]);

/*
$attr = [
    'ul'=>[
        'class' => "menu",
        'id' => "menu"
    ], 
    'li'=>[] 
];
echo $html->ul($attr);
*/

$attr = [
    'ul'=>[
        'class' => "menu",
        'id' => "menu"
    ], 
    'li'=>[
        ['class'=>"submenu"],
        ['class'=>"submenu"],
        ['class'=>"submenu"],
        ['class'=>"submenu"],
        ['class'=>"submenu"]
    ] 
];
// echo $html->ul($attr);
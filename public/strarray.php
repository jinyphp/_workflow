<?php
echo "문자열 배열변환\n";

$_PUT = [];
foreach(strArray("data[user][password]", "1111") as $key => $value) {
    $_PUT[$key] = $value;
}
foreach(strArray("data1[user1][password1]", "2222") as $key => $value) {
    $_PUT[$key] = $value;
}

print_r($_PUT);


function strArray($str, $value) {
    echo $str."\n";
    $arr = [];
    $key = "";
    for ($i=0;$i<strlen($str);$i++) {
        // echo $i;
        if($str[$i] == "[") {
            \array_push($arr, $key);
            $key = "";
        } else if($str[$i] == "]") { 
            \array_push($arr, $key);
            $key = "";
            $i++;
        } else {
            $key .= $str[$i];
        }
    }

    // print_r($arr);

    return v($arr, $value);
}




function setvalue($key, $value)
    {
        $arr[$key] = $value;
        return $arr;
    }

function v($key, $v)
{
    

    $key = \array_reverse($key);
    $temp = setvalue($key[0], $v);
    for ($i=1;$i<count($key);$i++) {
        $temp = setvalue($key[$i], $temp);
    }

    return $temp;
}



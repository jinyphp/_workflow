<?php
$autoload = require "../vendor/autoload.php";

print_ln($_SERVER['HTTP_CONTENT_TYPE']);
print_ln("upload");
print_r($_POST);

echo $_FILES['inpFile']['name'];

$path = "./upload/".basename($_FILES['inpFile']['name']);
move_uploaded_file($_FILES['inpFile']['tmp_name'], $path);

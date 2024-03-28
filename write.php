<?php
$name         = $_POST["name"];
$ingredients  = $_POST["ingredients"];
$instructions = $_POST["instructions"];
$jitan        = $_POST["jitan"];
$kotteri      = $_POST["kotteri"];
$assari       = $_POST["assari"];
$yes          = $_POST["yes"];
$no           = $_POST["no"];
$memo         = $_POST["memo"];
$photo        = $_POST["photo"];
$c            = ",";



// 写真
$pic = $_FILES['photo'];
var_dump($pic);

$ext = substr($pic['name'], -4);
var_dump($ext);
if ($ext == '.gif' || $ext == '.jpg' || $ext == '.png') :
    $filePath = './user_img/' . $pic['name'];
    var_dump($filePath);
    $success = move_uploaded_file($pic['tmp_name'], $filePath);
var_dump($success);

    if ($success) :

    endif;
endif;

// 一旦、写真、キーワード、完成の項目は抜く
$str = $name . $c . $filePath . $c . $ingredients . $c . $instructions . $c . $memo;

// オープンモード"a":ファイルがない場合は新規作成する。ファイルポインタの位置は末尾。 
$file = fopen("data.csv", "a");
fwrite($file, $str."\n");
fclose($file);


header("Location: read.php");

?>


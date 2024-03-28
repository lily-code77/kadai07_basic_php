<?php
$name         = htmlspecialchars($_POST["name"], ENT_QUOTES);
$ingredients  = htmlspecialchars($_POST["ingredients"], ENT_QUOTES);
$instructions = htmlspecialchars($_POST["instructions"], ENT_QUOTES);
$jitan        = $_POST["jitan"];
$kotteri      = $_POST["kotteri"];
$assari       = $_POST["assari"];
$memo         = htmlspecialchars($_POST["memo"], ENT_QUOTES);
$yesNo        = htmlspecialchars($_POST["yesNo"], ENT_QUOTES);
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

// 一旦、キーワードの項目は抜く
$str = $name . $c . $filePath . $c . $ingredients . $c . $instructions . $c . $memo . $c . $yesNo;

// オープンモード"a":ファイルがない場合は新規作成する。ファイルポインタの位置は末尾。 
$file = fopen("data.csv", "a");
fwrite($file, $str."\n");
fclose($file);


header("Location: read.php");

?>


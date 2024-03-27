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

// 一旦、写真、キーワード、完成の項目は抜く
$str = $name.$c.$ingredients.$c.$instructions.$c.$memo;

// オープンモード"a":ファイルがない場合は新規作成する。ファイルポインタの位置は末尾。 
$file = fopen("data.csv", "a");
fwrite($file, $str."\n");
fclose($file);


header("Location: read.php");

?>


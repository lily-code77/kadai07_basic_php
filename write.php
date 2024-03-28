<?php
$name         = htmlspecialchars($_POST["name"], ENT_QUOTES);
$ingredients  = htmlspecialchars($_POST["ingredients"], ENT_QUOTES);
$instructions = htmlspecialchars($_POST["instructions"], ENT_QUOTES);
$keyword      = $_POST["keyword"];
$memo         = htmlspecialchars($_POST["memo"], ENT_QUOTES);
$yesNo        = htmlspecialchars($_POST["yesNo"], ENT_QUOTES);
$c            = ",";


// 写真
$pic = $_FILES['photo'];
// var_dump($pic);

$ext = substr($pic['name'], -4);
// var_dump($ext);
if ($ext == '.gif' || $ext == '.jpg' || $ext == '.png') :
    $filePath = './user_img/' . $pic['name'];
    // var_dump($filePath);
    $success = move_uploaded_file($pic['tmp_name'], $filePath);
    // var_dump($success);

    if ($success) :

    endif;
endif;

// チェックボックスの値（配列）を文字列にする
if (isset($keyword) && is_array($keyword)){
    $keywords = implode(",", $keyword);
}
var_dump($keyword);

// 一旦、キーワードの項目は抜く
$str = $name . $c . $filePath . $c . $ingredients . $c . $instructions . $c . $memo . $c . $yesNo . $c . $keywords;
var_dump($str);

// オープンモード"a":書き込み専用でファイルをオープン。ファイルがない場合は新規作成する。ファイルポインタの位置は末尾。 
$file = fopen("data.csv", "a");

fwrite($file, $str."\n");
fclose($file);


header("Location: read.php");

?>


<?php
// ファイルを変数に格納
$filename = 'data.csv';

// fopenでファイルを開く（'r'は読み込みモードで開く）
$fp = fopen($filename, 'r');

$array = array();
// whileで行末までループ処理
while (!feof($fp)) {

    // fgetsでファイルを読み込み、変数に格納
    $txt = fgets($fp);

    // ファイルを読み込んだ変数を出力
    // echo $txt . '<br>';

    // 文字列を配列に置換
    $array[] = explode(',', $txt);
}

// var_dump($array);

// 各配列を画面に表示している
// foreach ($array as $vals) {
//     echo '料理名：' . $vals[0];
//     echo '<br>';
//     echo '材料：' . $vals[1];
//     echo '<br>';
//     echo '作り方：' . $vals[2];
//     echo '<br>';
//     echo 'メモ：' . $vals[3];
//     echo '<br>';
//     echo '<br>';
// }

// fcloseでファイルを閉じる
fclose($fp);
?>
<html>

<head>
    <meta charset="utf-8">
    <title>My Recipe Collection</title>
</head>

<body>
    <?php
    $json = json_encode($array, JSON_UNESCAPED_UNICODE);
    ?>

    <script>
        // JSONファイルに、改行コードなどの特殊文字が混入しるので、それらを取り除く。
        let jsonText = '<?= $json; ?>';
        let clean_jsonText = jsonText.replace(/[\u0000-\u0019]+/g, "");
        
        let jsArray = JSON.parse(clean_jsonText);
        console.log({
            jsArray
        });
    </script>


    <a href="index.php">index.php</a>
</body>

</html>
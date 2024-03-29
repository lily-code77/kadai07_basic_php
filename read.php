<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Lab | 食べたい料理に出会える場所</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/readStyle.css">
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Murecho:wght@100..900&display=swap" rel="stylesheet">
</head>

<?php
// ファイルを変数に格納
$filename = 'data2.csv';

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
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <h2>マイレシピ　コレクション</h2>
    <div class="myRecipe">
        <ul class="item"></ul>
    </div>

    <h2>作成中のレシピ</h2>
    <div class="unfinished">
        <ul class="unfinishedItem"></ul>
    </div>

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
        console.log(jsArray.length);

        for (let i = 0; i < jsArray.length - 1; i++) {
            console.log(`length: ${jsArray[i].length}`);

            let hashTags = ""
            for (let j = 6; j < jsArray[i].length; j++) {
                hashTags += "#";
                hashTags += jsArray[i][j];
                hashTags += " ";
            }

            const output =
                '<li class="list">' +
                '<h3 class="title">' +
                jsArray[i][0] +
                '</h3>' +
                '<p class="img">' +
                '<img src="' + jsArray[i][1] + '" width="300px">' +
                '</p>' +
                '<p class="ing">' +
                jsArray[i][2] +
                '</p>' +
                '<p class="ins">' +
                jsArray[i][3] +
                '</p>' +
                '<p class="memo">' +
                jsArray[i][4] +
                '</p>' +
                '<p class="hashTag">' +
                hashTags +
                '</p>' +
                '</li>';

            if (jsArray[i][5] === "yes") {
                $('.item').append(output);
            } else {
                $('.unfinishedItem').append(output);
            }

        }
    </script>


    <a href="index.php">index.php</a>
</body>

</html>
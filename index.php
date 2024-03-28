<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Lab | 食べたい料理に出会える場所</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <h1>マイレシピ　ラボ</h1>
    <form action="write.php" method="post" enctype="multipart/form-data">
        <div>
            ＊料理名：<input type="text" name="name" id=""><br>
            写真：<input type="file" name="photo" id=""><br>
            ＊材料：<input type="text" name="ingredients" id=""><br>
            ＊作り方：<input type="text" name="instructions" id=""><br>
            キーワード (複数選択可能)：
            <div>
                <input type="checkbox" name="jitan">
                <label for="jitan">時短</label>
            </div>
            <div>
                <input type="checkbox" name="kotteri" id="">
                <label for="kotteri">こってり</label>
            </div>
            <div>
                <input type="checkbox" name="assari" id="">
                <label for="assari">あっさり</label>
            </div>
            メモ：<textarea name="memo" id="" cols="30" rows="10"></textarea>
            ＊完成：<input type="radio" name="yesNo" value="yes">YES<input type="radio" name="yesNo" value="no">NO<br>
        </div>
        <button type="submit">作成</button>
    </form>
</body>

</html>
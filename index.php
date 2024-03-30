<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>紡くっく | 料理でつながるコミュニティサイト</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/indexStyle.css">
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Murecho:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
    <h1>マイレシピ登録</h1>
    <form action="write.php" method="post" enctype="multipart/form-data">
        <div class="content">
            料理名：<br><input type="text" name="name" class="input"><br>
            写真(.png、.jpg、.gifのみ対応)：<br><input type="file" name="photo" class=""><br>
            材料：<br><input type="text" name="ingredients" class="input big"><br>
            作り方：<br><input type="text" name="instructions" class="input big"><br>
            キーワード (複数選択可能)：
            <div class="keywordSelect">
                <div>
                    <input type="checkbox" name="keyword[]" value="わくわく">
                    <label for="wakuwaku">わくわく</label>
                </div>
                <div>
                    <input type="checkbox" name="keyword[]" value="癒された">
                    <label for="iyasareta">癒された</label>
                </div>
                <div>
                    <input type="checkbox" name="keyword[]" value="緊張する">
                    <label for="kinchousuru">緊張する</label>

                </div>
            </div>

            レシピ背景：<br><textarea name="memo" id="textarea" cols="70" rows="10"></textarea><br>
            完成：<input type="radio" name="yesNo" value="yes">YES<input type="radio" name="yesNo" value="no">NO<br>
        </div>
        <button id="b" type="submit">作成</button>
    </form>
</body>

</html>
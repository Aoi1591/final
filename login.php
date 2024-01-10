<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
</head>
<body>
    <form action="login_out.php" method="post">
        ログイン名<input typr="text" name="name"><br>
        パスワード<input type="password" name="password"><br>
        <input type="submit" value="ログイン">
        <input type="button" value="新規登録" onclick="uzer_toroku.php">新規登録
    </form>
</body>
</html>
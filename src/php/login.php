<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
</head>
<body>
    <form action="login_out.php" method="post">
        メールアドレス<input type="text" name="address"><br>
        パスワード<input type="password" name="pass"><br>
        <input type="submit" value="ログイン">
    </form>
    <form action="uzer_toroku.php">
        <input type="submit" value="新規登録">
    </form>
</body>
</html>
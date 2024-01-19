<?php require 'title.php';?>
<?php require 'header.php';?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>ログイン</title>
</head>
<body>
    <form action="login_out.php" method="post">
        <p>
        メールアドレス<input type="text" name="address"><br>
        　パスワード　<input type="password" name="pass"><br>
        </p>
        <div class="log">
        <input class="login" type="submit" value="ログイン">
    </form>
    <form action="uzer_toroku.php">
        <input class="toro" type="submit" value="新規登録"> 
        </div>
    </form>
</body>
</html>
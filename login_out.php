<?php
session_start();
require "db_connect.php";
unset($_SESSION['Uzer']);

$pdo = new PDO($connect, USER, PASS);
$sql = $pdo->prepare('select * from Uzer where name=?');
$sql->execute([$_POST['name']]);
$result = $sql->fetchAll();

//var_dump($result); データベースからの結果確認

foreach ($result as $row) {
    // ハッシュ化されていない場合のパスワード比較
    if($_POST['pass'] == $row['pass']) {
        $_SESSION['Uzer'] = [
            'id' => $row['uzer_id'],
            'name' => $row['name'],
            'password' => $row['pass'] // ハッシュ化されていないパスワードをセッションに保存
        ];
    }
}

if(isset($_SESSION['Uzer'])) {
    echo 'ログインに成功しました！';
    echo '<a href="top.php">トップへ</a>'; // top.phpにとばす
} else {
    echo 'ログイン名またはパスワードが違います';
}
?>

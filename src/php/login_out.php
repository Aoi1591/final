<?php
session_start();
require "db_connect.php";
require 'title.php';
require 'header.php';
echo '<link rel="stylesheet" href="../css/login.css">';
unset($_SESSION['Uzer']);

$pdo = new PDO($connect, USER, PASS);
$sql = $pdo->prepare('select * from Uzer where address=?');
$sql->execute([$_POST['address']]);
$result = $sql->fetchAll();

//var_dump($result); データベースからの結果確認

foreach ($result as $row) {
    // ハッシュ化されていない場合のパスワード比較
    if($_POST['pass'] == $row['pass']) {
        $_SESSION['Uzer'] = [
            'id' => $row['uzer_id'],
            'address' => $row['address'],
            'pass' => $row['pass'] // ハッシュ化されていないパスワードをセッションに保存
        ];
    }
}
if(isset($_SESSION['Uzer'])) {
    echo '<div class="mesage">';
    echo 'ログインに成功しました！';
    echo '</div>';
    echo '<a href="top.php">トップへ</a>'; // top.phpにとばす
} else {
    echo '<div class="mesage">';
    echo 'メールアドレスまたはパスワードが違います';
    echo '</div>';
}
?>

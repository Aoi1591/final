<?php session_start();?>
<?php require "db_connect.php"?>
<?php
unset($_SESSION['Uzer']);
$pdo=new PDO($connect,USER,PASS);
$sql=$pdo->prepare('select * from Uzer where name=?');
$sql->execute([$_POST['name']]);
foreach ($sql as $row){
    if($_POST['password'] == $row['password']){
    $_SESSION['Uzer']=[
        'id' =>$row['uzer_id'],
        'name'=>$row['name'],
        'password'=>$row['password']];
    }
    
}
if(isset($_SESSION['Uzer'])){
    echo 'ログインに成功しました！';
    echo '<a href="top.php">トップへ</a>'; //top.phpにとばす
}else {
    echo 'ログイン名またはパスワードが違います';
}
?>
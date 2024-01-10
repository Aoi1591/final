<?php require "db_connect.php"?>
<?php
unset($_SESSION['Uzer']);
$pdo=new PDO($connect,USER,PASS);
$sql=$pdo->prepare('select * from Uzer where login=?');
$sql->execute([$_POST['login']]);
foreach ($sql as $row){
    if(password_verify($_POST['password'],$row['password'])){
    $_SESSION['Uzer']=[
        'id' =>$row['uzer_id'],'name'=>$row['name'],
        'login'=>$row['login'],
        'password'=>$row['password']];
    }
    
}
if(isset($_SESSION['Uzer'])){
    echo '<a href="top.php">'; //top.phpにとばす　なんだっけ？処理
}else {
    echo 'ログイン名またはパスワードが違います';
}
?>
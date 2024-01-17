<?php session_start();?>
<?php require 'header.php';?>
<?php require 'db-connect.php';?>
<?php
$pdo = new PDO($connect,USER,PASS);
if(isset($_SESSION['Uzer'])){
    $id=$_SESSION['Uzer']['id'];
    $sql=$pdo->prepare('select * from Uzer where id!=? and address=?');
    $sql->execute([$id,$_POST['adress']]);
}else{
    $sql=$pdo->prepare('select * from Uzer where address=?');
    $sql->execute([$_POST['address']]);
}
if(empty($sql->fetchAll())){
    if(isset($_SESSION['Uzer'])){
        $sql=$pdo->prepare('update Uzer set name=?,address=?,password=? where id=?');
        
        $sql->execute([
            $_POST['name'],$_POST['address'],$_POST['password'],$id]);
        $_SESSION['UZer']=[
            'id'=>$id,'name'=>$_POST['name'],
            'address'=>$_POST['address'],
            'passwoed'=>$_POST['password']];
        echo 'お客様情報を更新しました。';
    }else{
        $sql=$pdo->prepare('insert into Uzer values(null,?,?,?)');
        $sql->execute([
            $_POST['name'],$_POST['address'],$_POST['password']]);
        echo 'お客様情報を登録しました。';
    }
}else{
    echo 'ログイン名がすでに使用されていますので、変更してください。';
}
?>
<?php require 'footer.php';?>
<?php session_start();?>
<?php require 'db_connect.php';?>
<?php require 'title.php';?>
<?php require 'header.php';?>
<link rel="stylesheet" href="../css/Utoroku.css">
<?php
$pdo = new PDO($connect,USER,PASS);
if(isset($_SESSION['Uzer'])){
    $id=$_SESSION['Uzer']['id'];
    $sql=$pdo->prepare('select * from Uzer where uzer_id!=? and address=?');
    $sql->execute([$id,$_POST['address']]);
}else{
    $sql=$pdo->prepare('select * from Uzer where address=?');
    $sql->execute([$_POST['address']]);
}
if(empty($sql->fetchAll())){
    if(isset($_SESSION['Uzer'])){
        $sql=$pdo->prepare('update Uzer set name=?,address=?,pass=? where uzer_id=?');
        
        $sql->execute([
            $_POST['name'],$_POST['address'],$_POST['pass'],$id]);
        $_SESSION['UZer']=[
            'id'=>$id,'name'=>$_POST['name'],
            'address'=>$_POST['address'],
            'pass'=>$_POST['pass']];
        //トップに飛ばす
        echo 'ユーザー情報を更新しました。';
    }else{
        $sql=$pdo->prepare('insert into Uzer values(null,?,?,?)');
        $sql->execute([
            $_POST['name'],$_POST['address'],$_POST['pass']]);
            //ログインに飛ばす
            header("Location:./login.php");
            $alert = "<script type='text/javascript'>alert('ユーザー情報を登録しました。');</script>";
    }
}else{
    echo 'メールアドレスがすでに使用されていますので、変更してください。';
}
?>
</body>
</html>
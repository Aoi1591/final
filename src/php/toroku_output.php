<?php session_start();?>
<?php require 'db_connect.php';?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta chaeset="UTF-8">
        <title>登録</title>
    </head>
    <body>
        <?php
        if(isset($_SESSION['Uzer'])){
            $pdo = new PDO($connect,USER,PASS);
            $sql=$pdo->prepare('insert into Money(uzer_id,line_day,name,money,category,memo)values (?,?,?,?,?)');
          try{
        
           if(empty($_POST['line_day'])){
            echo '日付を入力してください。';
           }else if(empty($_POST['name'])){
            echo '用途を入力してください';
           }else if(!preg_match('/^[0-9]+$/',$_POST['money'])){
            echo '必要金額を整数で入力してください。';
           }else if(empty($_POST['memo'])){
            echo 'メモを入力してください';
           }else if($sql->execute([$_SESSION['Uzer']['id'],$_POST['line_day'],$_POST['name'],$_POST['money'],$_POST['category'],$_POST['memo']])){
            echo '<font color="red">登録しました。</font>';
           }
          }catch(PDOException $e){
            //echo $e;
           if(false !== strpos($e,'SQLSTATE[23000]')){
            echo '<font color="red">既に登録されています。</font>';
           }else{
            echo '<font color ="red">登録に失敗しました。</font>';
           }
          }
        }
        ?>
        <br><hr><br>
        <button onclick="location.href='top.php'">トップ画面へ</button>
    </body>
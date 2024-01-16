<?php require 'db_connect.php';?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta chaeset="UTF-8">
        <title>登録</title>
    </head>
    <body>
        <?php
        $pdo=new PDO($db_connect,USER,PASS);
        $sql=$pdo->prepare('insert into Money(date,name,category,price,memo)values (?,?,?,?,?)');
        try{
        
        if(empty($_POST['line_day'])){
            echo '日付を入力してください。';
        }else if(empty($_POST['name'])){
            echo '用途を入力してください';
        }else if($_POST['category']){
            //後でd記入
        }else if(!preg_match('/^[0-9]+$/',$_POST['price'])){
            echo '必要金額を整数で入力してください。';
        }else if(empty($_POST['memo'])){
            echo 'メモを入力してください';
        }else if($sql->execute([$_POST['line_day'],$_POST['name'],$_POST['category'],$_POST['price'],$_POST['memo']])){
            echo '<font color="red">追加に成功しました。</font>';
        }
    }catch(PDOException $e){
         //echo $e;
        if(false !== strpos($e,'SQLSTATE[23000]')){
            echo '<font color="red">既に登録されています。</font>';
        }else{
            echo '<font color ="red">追加に失敗しました。</font>';
        }
    }
        ?>
        <br><hr><br>
            <?php
            foreach($pdo->query('select*from Money') as $row){
        
                echo $row['line_day'];
                echo $row['name'];
                echo $row['category'];
                echo $row['price'];
                echo $row['memo'];
                echo "\n";
            }
            ?>
        <button onclick="location.href='top.php'">トップ画面へ</button>
    </body>
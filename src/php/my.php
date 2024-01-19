<?php require 'db_connect.php';?>
<?php require 'title.php';?>
<?php require 'header.php';?>
<link rel="stylesheet" href="../css/cate.css">
<!--<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録</title>
</head>
-->
    <h3>登録</h3>
    <?php
   $line_day = $name = $money = $memo ='';
   
    
    $pdo = new PDO($connect,USER,PASS);
    $sql =$pdo->prepare('select * from Uzer where uzer_id=?');

   if(isset($_SESSION['Category'])){
    $id=$_SESSION['Category']['id'];
    $name=$_SESSION['Money']['name'];
      }
   
   echo '<div>';
   echo '<form action="cate_output.php" method="post">';
   echo 'カテゴリー名';
   echo '<input type="text" name="name" value="',$name,'">';
   echo '<br>';
   echo '<input type="submit" value="確定">';
   echo  '</form>';
   echo '</div>';
   ?>
</body>
</html>
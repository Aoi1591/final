<?php require 'db_connect.php';?>
<?php require 'title.php';?>
<?php require 'header.php';?>
<!--<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録</title>
</head>
-->
    <h2>登録</h2>
    <?php
   $name=$address=$login=$password='';

   if(isset($_SESSION['Money'])){
    $line_day=$_SESSION['Money']['line_day'];
    $name=$_SESSION['Money']['name'];
    $category_id=$_SESSION['Money']['category_id'];
    $money=$_SESSION['Money']['money'];
    $memo = $_SESSION['Money']['memo'];
   }
   
   echo '<form action="toroku_output.php" method="post">';
   echo '日付';
   echo '<input type="date" name="line_day" value="',$line_day,'">';
   echo '<br>';
   echo '用途';
   echo '<input type="text" name="name" value="',$name,'">';
   echo '<br>';
   echo '金額';
   echo '<input type="text" name="money" value="',$money,'">';
   echo '<br>';
   echo 'メモ';
   echo '<input type="text" name="memo" value="',$memo,'">';
   echo '<br>';
   echo '<input type="submit" value="確定">';
   echo  '</form>';
   ?>
</body>
</html>
<?php require 'db_connect.php';?>
<?php require 'title.php';?>
<?php require 'header.php';?>
<link rel="stylesheet" href="../css/toroku.css">
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

   if(isset($_SESSION['Money'])){
    $line_day=$_SESSION['Money']['line_day'];
    $name=$_SESSION['Money']['name'];
    $category_id=$_SESSION['Money']['category_id'];
    $money=$_SESSION['Money']['money'];
    $memo = $_SESSION['Money']['memo'];
   }
   
   echo '<table>';
        echo '<tr><th>日付</th><th>用途</th><th>金額</th><th>カテゴリー</th><th>メモ</th></tr>';
   echo '<form action="toroku_output.php" method="post">';
   echo '<tr>';
   echo '<td>';
   echo '<input type="date" name="line_day" value="',$line_day,'">';
   echo '</td>';
   echo '<td>';
   echo '<input type="text" name="name" value="',$name,'">';
   echo '</td>';
   echo '<td>';
   echo '<input type="text" name="money" value="',$money,'">';
   echo '</td>';
   echo '<td>';
   //プルダウン
   echo '<select name="category" id="category">';
       
   // カテゴリーのデータを取得してプルダウンメニューに表示
   $categorySql = $pdo->prepare('SELECT id, name FROM Category');
   $categorySql->execute();
       
      while ($categoryRow = $categorySql->fetch(PDO::FETCH_ASSOC)) {
            echo '<option value="' . $categoryRow['id'] . '">' . $categoryRow['name'] . '</option>';
      }
   
   echo '</select>';
   echo '</td>';
   echo '<td>';
   echo '<input type="text" name="memo" value="',$memo,'">';
   echo '</td>';
   echo '</tr>';
   echo '</table>';
   echo '<br>';
   echo '<input type="submit" value="確定">';
   echo  '</form>';
   ?>
</body>
</html>
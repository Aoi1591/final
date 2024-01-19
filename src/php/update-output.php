<?php session_start();?>
<?php require 'db_connect.php';?>
<?php require 'title.php';?>
<?php require 'header.php';?>

  <!DOCTYPE html>
   <html lang="ja">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/update.css">
        <title>更新</title>
    </head>
    <body>
        <?php
          $pdo=new PDO($connect,USER,PASS);
          $sql=$pdo->prepare('update Money set line_day=?,name=?,money=?,category_id=?,memo=? where id=?');
          if(empty($_POST['name'])){
             echo '用途を入力してください。';
          }else
           if(!preg_match('/[0+9]+/',$_POST['money'])){
             echo '金額を整数で入力しください。';
           }else

           //カテゴリー名からカテゴリーIDを取得
           $category_name = $_POST['category'];
           $category_sql = $pdo->prepare('SELECT id FROM Category WHERE name = ?');
           $category_sql->execute([$category_name]);
           $category_id = $category_sql->fetchColumn();

           if($sql->execute([htmlspecialchars($_POST['line_day']),($_POST['name']),($_POST['money']),($_POST['category']),($_POST['memo']),($_POST['dateid'])])){
            echo '更新に成功しました。';
           }else  {
            echo '更新に失敗しました。';
           }
        ?>
        <hr>
        <button onclick="location.href='top.php'">トップ画面へ</button>
    </body>
   </html>
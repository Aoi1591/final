<?php require 'db_connect.php';?>
  <!DOCTYPE html>
   <html lang="ja">
    <head>
        <meta charset="UTF-8">
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

           if($sql->execute([htmlspecialchars($_POST['line_day'],$_POST['name']),$_POST['money'],$_POST['category_id'],$_POST['memo'],$_POST['id']])){
            echo '更新に成功しました。';
           }else  {
            echo '更新に失敗しました。';
           }
        ?>
        <hr>
        <table>
            <tr><th>日付</th><th>用途</th><th>金額</th><th>カテゴリー</th><th>メモ</th></tr>

        <?php
        foreach($pdo->query('select*from Money') as $row){
            echo '<tr>';
            echo '<td>',$row['line_day'],'</td>';
            echo '<td>',$row['name'],'</td>';
            echo '<td>',$row['money'],'</td>';
            echo '<td>',$row['category_id'],'</td>';
            echo '<td>',$row['memo'],'</td>';
            echo '</tr>';
            echo "\n";
        }
        ?>
        </table>
        <button onclick="location.href='top.php'">トップ画面へ</button>
    </body>
   </html>
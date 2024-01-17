<?php session_start();?>
<?php require 'db_connect.php';?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お金管理</title>
</head>
<body>
    <?php
    //ログイン画面でセッションにいれる！！
    if(isset($_SESSION['Uzer'])){
        $pdo = new PDO($connect,USER,PASS);
        $sql =$pdo->prepare('select * from Money where uzer_id=?');
        
        //セッションから取得したユーザーIDを設定
        $sql->execute([$_SESSION['Uzer']['id']]);
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);

        //一覧
        foreach($result as $row){
            $id = $row['uzer_id'];

        echo '<table>';
		echo '<tr><th>日付</th><th>用途</th><th>金額</th><th>メモ</th></tr>';

        foreach ($pdo->query('select * from Money') as $row) {
           echo '<tr>';
           echo '<td>',$row['date'], '</td>';
           echo '<td>',$row['name'], '</td>';
           echo '<td>',$row['category'],'</td>';
           echo '<td>',$row['price'], '</td>';
           echo '<td>',$row['memo'],'</td>';
           echo '</tr>';
           echo "\n";
        }  
       </table>
            
            echo '<form action="delete.php" method="post">';
            echo '<input type="hidden" name="id" value="',$row['id'],'">';
            echo '<button type="submit">削除</button>';
            echo '</form>';

            echo '<form action="update.php" method="post">';
            echo '<input type="hidden" name="id" value="',$row['id'],'">';
            echo '<button type="submit">更新</button>';


        }
    }
    ?>

    
</body>
</html>
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
        $sql->excute([$_SESSION['Uzer']['id']])
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //一覧
        foreach($result as $row){
            $id = $row['user_id'];

            echo $row['line_day'];
            echo $row['name'];
            echo $row['category_id'];
            echo $row['money'];
            echo $row['memo'];


        }
    }
    ?>
    
</body>
</html>
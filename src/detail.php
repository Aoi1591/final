<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>詳細</title>
</head>
<body>
    <?php
       if(isset($_SESSION['User'])){
        $pdo = new PDO($connect,USER,PASS);
        $sql = 'SELECT  FROM Money';
        
        $stmt = $pdo->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $id = $row['user_id'];
            //内容表示
            echo $row['line_day'];
            echo $row['name'];
            echo $row['category_id'];
            echo $row['money'];
            echo $row['memo'];
       }
       echo '<a href="delete.php?id=',$id,'">削除</a>';
       echo '<a href="update.php?id=',$id,'">更新</a>';
    ?>
</body>
</html>
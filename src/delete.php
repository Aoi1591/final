<?php require 'db_connect.php';?>

<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>削除</title>
	</head>
	<body>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('delete from Money where id=?');
    if($sql->execute([$_POST['id']])){
        echo '削除に成功しました。';
    
    }else{
        echo '削除に失敗しました。';
    }

?>
    <br><hr><br>
	<table>
		<tr><th>商品番号</th><th>商品名</th><th>価格</th></tr>
<?php
    foreach ($pdo->query('select * from Product') as $row) {
        echo '<tr>';
        echo '<td>',$row['date'], '</td>';
        echo '<td>',$row['name'], '</td>';
        echo '<td>',$row['category'],'</td>';
        echo '<td>',$row['price'], '</td>';
        echo '<td>',$row['memo'],'</td>';
        echo '</tr>';
        echo "\n";
    }
?> 
</table>
        <button onclick="location.href='top.php'">トップへ戻る</button>
    </body>
</html>


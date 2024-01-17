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
		<tr><th>日付</th><th>用途</th><th>金額</th><th>メモ</th></tr>
<?php
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
?> 
</table>
        <button onclick="location.href='top.php'">トップへ戻る</button>
    </body>
</html>


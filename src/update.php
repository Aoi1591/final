<?php require 'db_connect.php';?>

<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>更新</title>
	</head>
	<body>
    <table>
    <tr><th>商品番号</th><th>商品名</th><th>商品価格</th></tr>
<?php
    $pdo=new PDO($connect, USER, PASS);
	$sql=$pdo->prepare('select * from Money where uzer_id=?');
	$sql->execute([$_POST['id']]);


	foreach ($sql as $row) {
        echo '<tr>';
		echo '<form action="update-output.php" method="post">';
        echo '<td> ';
		echo '<input type="text" name="id" value="', $row['line_date'], '">';
		echo '</td> ';
		echo '<td>';
		echo '<input type="text" name="name" value="', $row['name'], '">';
		echo '</td> ';
        echo '<td>';
		echo '<input type="text" name="name" value="', $row['category'], '">';
		echo '</td> ';
		echo '<td>';
		echo ' <input type="text" name="price" value="', $row['price'], '">';
		echo '</td> ';
        echo '<td>';
        echo '<input type="text" name="memo" value="',$row['memo'],'">';
        echo '</td>';
		echo '<td><input type="submit" value="更新"></td>';
		echo '</form>';
        echo '</tr>';
		echo "\n";
	}
?>
</table>
<button onclick="location.href='top.php'">トップへ戻る</button>
    </body>
</html>


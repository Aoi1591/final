<?php require 'db_connect.php';?>

<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<title>更新</title>
	</head>
	<body>
    <table>
    <tr><th>日付</th><th>用途</th><th>カテゴリー</th><th>金額</th><th>メモ</th></tr>
<?php
    $pdo=new PDO($connect, USER, PASS);
	$sql=$pdo->prepare('select * from Money where id=?');
	$sql->execute([$_POST['id']]);


	foreach ($sql as $row) {
        echo '<tr>';
		echo '<form action="update-output.php" method="post">';
        echo '<td> ';
		echo '<input type="text" name="line_day" value="', $row['line_day'], '">';
		echo '</td> ';
		echo '<td>';
		echo '<input type="text" name="name" value="', $row['name'], '">';
		echo '</td> ';
        echo '<td>';
		echo '<input type="text" name="name" value="', $row['category_id'], '">';
		echo '</td> ';
		echo '<td>';
		echo ' <input type="text" name="money" value="', $row['money'], '">';
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


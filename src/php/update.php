<?php require 'db_connect.php';?>
<?php require 'title.php';?>
<?php require 'header.php';?>
		<link rel="stlesheet" href="../css/update.css">
	<body>
	<?php

     $line_day = $name = $money = $memo ='';
   
    $pdo=new PDO($connect, USER, PASS);
	$sql=$pdo->prepare('select * from Money where id=?');
	$sql->execute([$_POST['id']]);

	echo '<table>';
	echo '<tr><th>日付</th><th>用途</th><th>金額</th><th>カテゴリー</th><th>メモ</th></tr>';

	foreach ($sql as $row) {
		$id = $row['id'];
		echo '<form action="update-output.php" method="post">';
		echo '<input type="hidden" name="dateid" value="', $id, '">';
		echo '<tr>';
		echo '<td>';
		echo '<input type="date" name="line_day" value="',$row['line_day'],'">';
		echo '</td>';
		echo '<td>';
		echo '<input type="text" name="name" value="',$row['name'],'">';
		echo '</td>';
		echo '<td>';
		echo '<input type="text" name="money" value="',$row['money'],'">';
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
		echo '<input type="text" name="memo" value="',$row['memo'],'">';
		echo '</td>';
		echo '<tr>';
		echo '</form>';
		echo '</table>';
		echo "\n";
		echo '<input type="submit" value="更新">';
	}
?>
<button onclick="location.href='top.php'">トップへ戻る</button>
    </body>
</html>


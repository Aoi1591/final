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
        <button onclick="location.href='top.php'">トップへ戻る</button>
    </body>
</html>


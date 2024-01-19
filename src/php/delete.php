<?php require 'db_connect.php';?>
<?php 
      require 'title.php';
      require 'header.php';
?>

<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
        <link rel="stylesheet" href="../css/delete.css">
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
    </body>
</html>


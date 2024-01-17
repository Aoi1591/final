<?php require 'db_connect.php';?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>更新</title>
</head>
<body>
    
<?php
$pdo = new PDO($connect, USER, PASS);
$sql = $pdo->prepare('update Money set line_day=?, name=?, money=?, category_id=?, memo=? where id=?');
          
if(empty($_POST['line_day']) || empty($_POST['name']) || !preg_match('/[0-9]+/', $_POST['money'])){
    echo '日付、用途、金額を正しく入力してください';
} else {
    $line_day = htmlspecialchars($_POST['line_day']);
    $name = htmlspecialchars($_POST['name']);
    $money = $_POST['money'];
    $category_id = $_POST['category_id'];
    $memo = htmlspecialchars($_POST['memo']);
    
    if($sql->execute([$line_day, $name, $money, $category_id, $memo, $_POST['id']])){
        echo '更新に成功しました。';
    } else {
        echo '更新に失敗しました。';
    }
}
?>
<hr>
<table>
    <tr><th>日付</th><th>用途</th><th>金額</th><th>カテゴリー</th><th>メモ</th></tr>

<?php
foreach($pdo->query('select * from Money') as $row){
    echo '<tr>';
    echo '<td>', $row['line_day'], '</td>';
    echo '<td>', $row['name'], '</td>';
    echo '<td>', $row['money'], '</td>';
    echo '<td>', $row['category_id'], '</td>';
    echo '<td>', $row['memo'], '</td>';
    echo '</tr>';
    echo "\n";
}
?>
</table>

</body>
</html>
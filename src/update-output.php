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

// 更新処理
$sqlUpdate = $pdo->prepare('update Money set line_day=?, name=?, money=?, category_id=?, memo=? where id=?');
          
if (empty($_POST['line_day']) || empty($_POST['name']) || !preg_match('/[0-9]+/', $_POST['money'])) {
    echo '日付、用途、金額を正しく入力してください';
} else {
    $line_day = htmlspecialchars($_POST['line_day']);
    $name = htmlspecialchars($_POST['name']);
    $money = $_POST['money'];
    $category_id = $_POST['category_id'];
    $memo = htmlspecialchars($_POST['memo']);
    
    if ($sqlUpdate->execute([$line_day, $name, $money, $category_id, $memo, $_POST['id']])) {
        echo '更新に成功しました。';
    } else {
        echo '更新に失敗しました。';
    }
}

// 挿入処理
$sqlInsert = $pdo->prepare('insert into Money (line_day, name, money, category_id, memo) values (?, ?, ?, ?, ?)');

if (isset($_POST['insert'])) {
    // 新しいデータを挿入
    $line_day = htmlspecialchars($_POST['line_day']);
    $name = htmlspecialchars($_POST['name']);
    $money = $_POST['money'];
    $category_id = $_POST['category_id'];
    $memo = htmlspecialchars($_POST['memo']);
    
    if ($sqlInsert->execute([$line_day, $name, $money, $category_id, $memo])) {
        echo '挿入に成功しました。';
    } else {
        echo '挿入に失敗し

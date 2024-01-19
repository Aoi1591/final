<?php session_start(); ?>
<?php require 'db_connect.php'; ?>
<?php require 'title.php';?>
<?php require 'header.php';?>
<link rel="stylesheet" href="../css/toroku.css">


    <?php
    if (isset($_SESSION['Uzer'])) {
        try {
            $pdo = new PDO($connect, USER, PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = $pdo->prepare('INSERT IGNORE INTO Money(uzer_id, line_day, name, category_id, money, memo) VALUES (?, ?, ?, ?, ?, ?)');

            if (empty($_POST['line_day'])) {
                echo '日付を入力してください。';
            } else if (empty($_POST['name'])) {
                echo '用途を入力してください';
            } else if (!preg_match('/^[0-9]+$/', $_POST['money'])) {
                echo '必要金額を整数で入力してください。';
            } else if (empty($_POST['memo'])) {
                echo 'メモを入力してください';
            } else {
                //カテゴリー名からカテゴリーIDを取得
                $category_name = $_POST['category'];
                $category_sql = $pdo->prepare('SELECT id FROM Category WHERE name = ?');
                $category_sql->execute([$category_name]);
                $category_id = $category_sql->fetchColumn();
                 
                $result = $sql->execute([$_SESSION['Uzer']['id'], $_POST['line_day'], $_POST['name'], $_POST['category'], $_POST['money'], $_POST['memo']]);
                
                if ($result) {
                    echo '<font color="red">登録しました。</font>';
                } else {
                    echo '<font color="red">既に登録されています。</font>';
                }
            }
        } catch (PDOException $e) {
            echo '<font color="red">登録に失敗しました。' . $e->getMessage() . '</font>';
            // エラーログなどにエラーメッセージを出力する場合はここに追加
        }
    }
    ?>
    <br><hr><br>
</body>
</html>

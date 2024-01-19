<?php session_start(); ?>
<?php require 'db_connect.php'; ?>
<?php require 'title.php';?>
<?php require 'header.php';?>
    <link rel="stylesheet" href="../css/cate.css">
    <?php
    if (isset($_SESSION['Uzer'])) {
        try {
            $pdo = new PDO($connect, USER, PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = $pdo->prepare('INSERT  INTO Category(name) VALUES (?)');

            if (empty($_POST['name'])) {
                echo '日付を入力してください。';
            } else {

                $result = $sql->execute([$_POST['name']]);
                
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
</body>
</html>

<?php session_start();?>
<?php require 'db_connect.php';?>
<?php require 'title.php';?>
<?php require 'header.php';?>
<link rel="stylesheet" href="../css/top.css">

<?php
//ログイン画面でセッションにいれる！！
if(isset($_SESSION['Uzer'])){
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->prepare('select * from Uzer where uzer_id=?');
    
    //セッションから取得したユーザーIDを設定
    $sql->execute([$_SESSION['Uzer']['id']]);
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);

    //一覧
    foreach($result as $userRow){
        $uzer_id = $userRow['uzer_id'];

        echo '<table>';
        echo '<tr><th>日付</th><th>用途</th><th>金額</th><th>カテゴリー</th><th>メモ</th><th>削除</th><th>更新</th></tr>';

        foreach ($pdo->query('select * from Money') as $moneyRow) {
            $id = $moneyRow['id'];
            echo '<tr>';
            echo '<td>', $moneyRow['line_day'], '</td>';
            echo '<td>', $moneyRow['name'], '</td>';
            echo '<td>', $moneyRow['money'], '</td>';
            
            //カテゴリーの取得
            $category_id = $moneyRow['category_id'];
            $category_sql = $pdo->prepare('SELECT name FROM Category WHERE id = ?');
            $category_sql->execute([$category_id]);
            $category_name = $category_sql->fetchColumn();

            echo '<td>', $category_name, '</td>';
            echo '<td>', $moneyRow['memo'], '</td>';

            //削除
            echo '<td>';
            echo '<form action="delete.php" method="post">';
            echo '<input type="hidden" name="id" value="', $id, '">';
            echo '<button type="submit">削除</button>';
            echo '</form>';
            echo '</td>';

            //更新
            echo '<td>';
            echo '<form action="update.php" method="post">';
            echo '<input type="hidden" name="id" value="', $id, '">';
            echo '<button type="submit">更新</button>';
            echo '</form>';
            echo '</td>';

            echo '</tr>';
            echo "\n";
        }  
        echo '</table>';
    }
}
?>
</body>
</html>

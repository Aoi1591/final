<?php session_start();?>
<?php require 'db_connect.php';?>
<?php require 'header.php';?>
    <?php
    //ログイン画面でセッションにいれる！！
    if(isset($_SESSION['Uzer'])){
        $pdo = new PDO($connect,USER,PASS);
        $sql =$pdo->prepare('select * from Uzer where uzer_id=?');
        
        //セッションから取得したユーザーIDを設定
        $sql->execute([$_SESSION['Uzer']['id']]);
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);

        

        //一覧
        foreach($result as $row){
            $uzer_id = $row['uzer_id'];
    

        echo '<table>';
		echo '<tr><th>日付</th><th>用途</th><th>金額</th><th>メモ</th></tr>';

        foreach ($pdo->query('select * from Money') as $row) {
          $id = $row['id'];
           echo '<tr>';
           echo '<td>',$row['line_day'], '</td>';
           echo '<td>',$row['name'], '</td>';
           
           //プルダウン
           echo '<label for="category">カテゴリー選択:</label>';
           echo '<select name="category" id="category">';
       
           // カテゴリーのデータを取得してプルダウンメニューに表示
           $categorySql = $pdo->prepare('SELECT id, name FROM Category');
           $categorySql->execute();
       
           while ($categoryRow = $categorySql->fetch(PDO::FETCH_ASSOC)) {
               echo '<option value="' . $categoryRow['id'] . '">' . $categoryRow['name'] . '</option>';
           }
       
           echo '</select>';

           echo '<td>',$row['money'], '</td>';
           echo '<td>',$row['memo'],'</td>';
           echo '</tr>';
           echo "\n";
        }  
        echo '</table>';
            
            echo '<form action="delete.php" method="post">';
            echo '<input type="hidden" name="id" value="',$row['id'],'">';
            echo '<button type="submit">削除</button>';
            echo '</form>';

            echo '<form action="update.php" method="post">';
            echo '<input type="hidden" name="id" value="',$id,'">';
            echo '<button type="submit">更新</button>';
    }
}

    ?>

    
</body>
</html>
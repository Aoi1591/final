<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録</title>
</head>
<body>
    <h2>登録</h2>
    <?php
   $name=$address=$login=$password='';

   if(isset($_SESSION['Money'])){
    $line_day=$_SESSION['Money']['line_day'];
    $name=$_SESSION['Money']['name'];
    $category_id=$_SESSION['Money']['category_id'];
    $money=$_SESSION['Money']['money'];
    $memo = $_SESSION['Money']['memo'];
   }
   
   echo '<form action="customer-output.php" method="post">';
   echo '<table>';
   echo '<tr><td>日付</td><td>';
   echo '<input type="date" name="line_day" value="',$line_day,'">';
   echo '</td></tr>';
   echo '<tr><td>名前</td><td>';
   echo '<input type="text" name="name" value="',$name,'">';
   echo '</td></tr>';
   echo '<tr><td>カテゴリー</td><td>';
   echo '<input type="text" name="caategory" value="',$category_id,'">';
   echo '</td></tr>';
   echo '<tr><td>金額</td><td>';
   echo '<input type="text" name="password" value="',$money,'">';
   echo '</td></tr>';
   echo '<tr><td>メモ</td><td>';
   echo '<input type="text" name="memo" value="',$memo,'">';
   echo '</table>';
   echo '<input type="submit" value="確定">';
   echo  '</form>';
   ?>
</body>
</html>
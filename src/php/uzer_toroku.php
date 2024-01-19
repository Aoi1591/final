<?php require 'title.php'; ?>
<link rel="stylesheet" href="../css/Utouroku.css">
<?php require 'header.php';?>
<link rel="stylesheet" href="../css/Utoroku.css">

    <center><h1>ユーザー登録</h1></center>
    <?php
       $name=$address=$login=$pass='';

       if(isset($_SESSION['Uzer'])){
         $name=$_SESSION['Uzer']['name'];
         $address=$_SESSION['Uzer']['address'];
         $pass=$_SESSION['Uzer']['pass'];
       }
   
       echo '<form action="uzer_toroku_output.php" method="post">';
       echo '<table>';
       echo '<tr><td>お名前</td><td>';
       echo '<input type="text" name="name" value="',$name,'">';
       echo '</td></tr>';
       echo '<tr><td>メールアドレス</td><td>';
       echo '<input type="text" name="address" value="',$address,'">';
       echo '</td></tr>';
       echo '<tr><td>パスワード</td><td>';
       echo '<input type="password" name="pass" value="',$pass,'">';
       echo '</td></tr>';
       echo '</table>';
       echo '<input type="submit" value="確定">';
       echo  '</form>';
    ?>
</body>
</html>
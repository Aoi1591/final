<?php require 'title.php'; ?>
<link rel="stylesheet" href="../css/Utouroku.css">
<?php require 'header.php';?>
<link rel="stylesheet" href="../css/toroku.css">

    <center><h3>ユーザー登録</h3></center>
    <?php
       $name=$address=$login=$pass='';

       if(isset($_SESSION['Uzer'])){
         $name=$_SESSION['Uzer']['name'];
         $address=$_SESSION['Uzer']['address'];
         $pass=$_SESSION['Uzer']['pass'];
       }

       echo '<p>';
       echo '<form action="uzer_toroku_output.php" method="post">';
       echo '<table>';
       echo '<tr><td>お名前</td><td>';
       echo '<input  class="text" type="text" name="name" value="',$name,'">';
       echo '</td></tr>';
       echo '<tr><td>メールアドレス</td><td>';
       echo '<input class="text" type="text" name="address" value="',$address,'">';
       echo '</td></tr>';
       echo '<tr><td>パスワード</td><td>';
       echo '<input class="text" type="password" name="pass" value="',$pass,'">';
       echo '</td></tr>';
       echo '</table>';
       echo '<input class="text" type="submit" value="確定">';
       echo  '</form>';
       echo '</p>';
    ?>
</body>
</html>
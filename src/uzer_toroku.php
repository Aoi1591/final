<?php require 'header.php'; ?>
<link rel="stylesheet" href="../css/touroku.css">
<title>ユーザー登録</title>
</head>
    <body>

    <center><h1>ユーザー登録</h1></center>
    <?php
       $name=$address=$login=$password='';

       if(isset($_SESSION['Uzer'])){
         $name=$_SESSION['Uzer']['name'];
         $address=$_SESSION['Uzer']['address'];
         $password=$_SESSION['Uzer']['password'];
       }
   
       echo '<form action="customer-output.php" method="post">';
       echo '<table>';
       echo '<tr><td>お名前</td><td>';
       echo '<input type="text" name="name" value="',$name,'">';
       echo '</td></tr>';
       echo '<tr><td>メールアドレス</td><td>';
       echo '<input type="text" name="address" value="',$address,'">';
       echo '</td></tr>';
       echo '<tr><td>パスワード</td><td>';
       echo '<input type="password" name="password" value="',$password,'">';
       echo '</td></tr>';
       echo '</table>';
       echo '<input type="submit" value="確定">';
       echo  '</form>';
    ?>
</body>
</html>
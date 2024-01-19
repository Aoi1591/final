<?php session_start();?>
<?php require 'title.php';?>
<?php require 'header.php';?>
<link rel="stylesheet" href="../css/logout.css">
 <?php
if(isset($_SESSION['Uzer'])){
    unset($_SESSION['Uzer']);
    echo 'ログアウトしました。';
}else{
    echo '既にログアウトしています。';
}
?>
</body>
</html>

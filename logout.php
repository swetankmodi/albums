<?php include('dbconn.php');
session_destroy();
setcookie('username',$_REQUEST['username'],time()-3600);
setcookie('username1',$_REQUEST['username1'],time()-3600);
header('Location:login.php');
?>
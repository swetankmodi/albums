<?php
include ('dist/header.php');
if(empty($_REQUEST['user']))
	header('Location:index.php');
?>
<html>
<head>
<br>
<br><br>
	<title>Profile</title>
</head>
<body><br>
<strong><p align="center"><font size="10" color="blue">Profile</font> </p></strong><br><br>
<?php
    include ('dist/functions/users/isLoggedIn.php');
?>
</body>
<div class="ui cards">
<?php
    include ('dist/functions/users/showProfile.php');
?>
</div>
<script src="dist/js/lightbox-plus-jquery.js"></script>
<?php include('footer.php'); ?>
</html>
    
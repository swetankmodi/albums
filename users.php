<?php
include ('dist/header.php');
?>

<html>
<head>
<br><br><br>
<link rel="stylesheet" type="text/css" href="dist/css/home.css">
	<title>Users</title>
</head>
<body>
</body>
<div class="ui cards">
<?php
include ('dist/functions/users/showUser.php');
?>
<script src="dist/js/card.js"></script>
<script src="dist/js/masthead.js"></script>
<script src="dist/js/lightbox-plus-jquery.js"></script>
<?php include ('footer.php'); ?>
</html>

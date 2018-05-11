<?php
include ('dist/header.php');
?>
<title> Albums </title>
<div class="ui special cards">
<?php
include ('dist/functions/albums/displayAlbums.php');
?>
<script src="dist/js/card.js"></script>
</div>
<?php include ('footer.php'); ?>

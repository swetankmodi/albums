<?php
include ('dist/header.php');
?>
<br><br>
<a href = "createalbum.php" class="ui large  button">Create a New Album</a>
<div class="ui items">
<?php
include ('dist/functions/albums/currentUserAlbums.php');
?>
</div>	
<?php include ('footer.php'); ?>

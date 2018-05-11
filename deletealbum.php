<?php
include ('dist/header.php');
if (empty($_REQUEST['id'])) header('Location:myalbums.php');
include ('dist/functions/albums/isAlbumOwner.php');
include ('dist/functions/albums/deleteAlbum.php');
?>
<?php include ('footer.php'); ?>

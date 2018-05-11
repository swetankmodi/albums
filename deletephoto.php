<?php
include ('dist/header.php');
if (empty($_REQUEST['id'])) header('Location:myalbums.php');
include ('dist/functions/photos/isPhotoOwner.php');
include ('dist/functions/photos/deletePhoto.php');
include ('footer.php'); 
?>

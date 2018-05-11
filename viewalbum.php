<?php
include ('dist/header.php');
if (empty($_REQUEST['id'])) header('Location:myalbums.php');
?>
<br>
<br>
<br>
<?php
include ('dist/functions/albums/canView.php');
?>
<div class="pusher">
  <div class="ui vertical stripe segment">
    <div class="ui right text container">
      <h3 class="ui header"><?php echo $rws[1]; ?></h3>
		<p><?php echo $rws[2]; ?></p>
<?php
include ('dist/functions/albums/canEdit.php');
?>	
    </div>
  </div>
</div>
<div class="ui special cards">
<?php
include ('dist/functions/albums/displayPhotos.php');
?>	
<script src="dist/js/card.js"></script>
<script src="dist/js/lightbox-plus-jquery.js"></script>
</div>
<?php include ('footer.php'); ?>

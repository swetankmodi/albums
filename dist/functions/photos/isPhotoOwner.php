<?php
$photoid=$dbb->real_escape_string($_REQUEST["id"]);
$sql = "SELECT * FROM photos WHERE id='{$photoid}'";
$result = $dbb->query($sql) or die($dbb->error);
$rws = $result->fetch_array();
$owner = $rws[3];
if ($currentuser != $owner)
  {
    header('Location:albums.php');
  }
?>
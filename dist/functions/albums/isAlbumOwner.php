<?php
$albumid=$dbb->real_escape_string($_REQUEST["id"]);
$sql = "SELECT * FROM albums WHERE id='{$albumid}'";
$result = $dbb->query($sql) or die($dbb->error);
$rws = $result->fetch_array();
$owner = $rws[3];
if ($currentuser != $owner)
  {
    header('Location:albums.php');
  }

?>
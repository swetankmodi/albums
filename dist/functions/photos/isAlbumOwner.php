<?php
$albumid = $dbb->real_escape_string($_REQUEST["id"]);
$sql = "SELECT * FROM albums WHERE id='{$albumid}'";
$result = $dbb->query($sql) or die($dbb->error);
$num_rows = mysqli_num_rows($result);
if ($num_rows == 0)
  {
    header('Location:albums.php');
  }

$rws = $result->fetch_array();
$owner = $rws[3];
$visi = $rws[6];
if ($visi == "private" && $currentuser != $owner)
  {
    header('Location:albums.php');
  }

?>
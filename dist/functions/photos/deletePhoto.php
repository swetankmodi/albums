<?php
$redirect = 'Location:viewalbum.php?id=' . $rws[1];
$filename = 'uploads/' . $rws[4];
unlink($filename);
$photoid=$dbb->real_escape_string($_REQUEST["id"]);
$sql = "DELETE FROM photos WHERE id='{$photoid}'";
$result = $dbb->query($sql) or die($dbb->error);
header($redirect);
?>
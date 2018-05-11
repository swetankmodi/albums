<?php
$user=$dbb->real_escape_string($_REQUEST['user']);
$sql = "SELECT * FROM users WHERE username='{$user}'";
$result = $dbb->query($sql) or die($dbb->error);
$rws = $result->fetch_array();
if ($result->num_rows == 0 || $currentuser != $_REQUEST['user'])
  {
    $redirect = 'Location:profile.php?user=' . $currentuser;
    header($redirect);
  }
?>
<?php
if (!empty($_REQUEST['submit']) && !empty($_REQUEST['email']) && !empty($_REQUEST['password']))
  {
    $email = $dbb->real_escape_string($_REQUEST['email']);
    $password = md5($_REQUEST['password']);
    $sql = "SELECT password FROM users WHERE username='{$email}'";
    $r = $dbb->query($sql) or die($dbb->error);
    $rws = $r->fetch_array(); //or die($dbb->error);
    if ($rws[0] == $password)
      {
        $sql = "SELECT * FROM users WHERE username='{$email}'";
        $r = $dbb->query($sql) or die($dbb->error);
        $rws = $r->fetch_array(); //or die($dbb->error);
        session_start();
        setcookie('username', 1, time() + 3600);
        setcookie('username1', $rws[0], time() + 3600);

        header('Location:index.php');
      }
    else echo "Invalid Password or Username Combination";
  }
?>
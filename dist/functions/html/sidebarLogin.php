<?php if (empty($_COOKIE['username1']))
  {
    echo '
  <a href = "login.php" class="item">Login</a>
  <a href = "create.php" class="item">Signup</a>';
  }
else echo '
  <a href = "logout.php" class="item">Logout</a>
';
?>
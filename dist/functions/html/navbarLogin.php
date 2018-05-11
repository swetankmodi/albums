<?php 
if (empty($_COOKIE['username1']))
  {
    echo '         <a href="login.php" class="ui inverted button">Log in</a>
          <a href="create.php" class="ui inverted button">Sign Up</a>';
  }
else echo '<a href="logout.php" class="ui inverted button">Log Out</a>';
?>
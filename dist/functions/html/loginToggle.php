<?php if (empty($_COOKIE['username1']))
  {
    echo '
      <div class="item">
        <a href="login.php" class="ui button">Log in</a>
      </div>
      <div class="item">
        <a href = "create.php" class="ui primary button">Sign Up</a>
	</div>';
  }
else echo '<a href="logout.php" class="ui primary button">Log Out</a>';
?>
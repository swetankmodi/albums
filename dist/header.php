<?php
include ('dbconn.php');
if (!empty($_COOKIE['username'])) $_SESSION['val'] = $_COOKIE['username'];
if (empty($_SESSION['val'])) header('Location:login.php');
if (!empty($_COOKIE['username1'])) $currentuser = $_COOKIE['username1'];
?>
<link href="dist/css/lightbox.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
<link rel="stylesheet" type="text/css" href="semantic/dist/components/rating.css">
<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
<script src="semantic/dist/semantic.min.js"></script>
<div class="ui large inverted top fixed menu">
  <div class="ui container">
    <a href="index.php" class="item">Home</a>
	<a href="profile.php?user=<?php echo $_COOKIE['username1']; ?>" class="item">Profile</a>
	<a href="albums.php" class="item">All Albums</a>
	<a href="myalbums.php" class="item">My Albums</a>
	<a href="users.php" class="item">Users</a>
    <div class="right menu">
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
    </div>
  </div>
</div>
<br>
<br>
<br>
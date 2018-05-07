<?php
include('dbconn.php');
if(!empty($_COOKIE['username']))
	$_SESSION['val']=$_COOKIE['username'];
if(empty($_SESSION['val']))
	header('Location:login.php');
if(!empty($_COOKIE['username1']))
	$currentuser=$_COOKIE['username1'];
?><script type="text/javascript" src="semantic/dist/components/rating.js"></script>
    <link rel="stylesheet" type="text/css" href="semantic/dist/components/rating.css">
<link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
<script src="semantic/dist/semantic.min.js"></script>
<div class="ui large inverted top fixed menu">
  <div class="ui container">
    <a href="index.php" class="item">Home</a>
	<a href="profile.php?user=<?php echo $_COOKIE['username1'];?>" class="item">Profile</a>
	<a href="albums.php" class="item">All Albums</a>
	<a href="myalbums.php" class="active item">My Albums</a>
	<a href="users.php" class="item">Users</a>
    <div class="right menu">
	<?php if(empty($_COOKIE['username1']))
	{
		echo'
      <div class="item">
        <a href="login.php" class="ui button">Log in</a>
      </div>
      <div class="item">
        <a href = "create.php" class="ui primary button">Sign Up</a>
	</div>';}
	else
		echo '<a href="logout.php" class="ui primary button">Log Out</a>';
?>
    </div>
  </div>
</div>
<br><br>
<a href = "createalbum.php" class="ui large  button">Create a New Album</a>
<div class="ui items">
<?php 
$sql="SELECT * FROM albums WHERE user='{$currentuser}'";
$result=	$dbb->query($sql) or die($dbb->error);
while($rws=$result->fetch_array())
{
	 echo ' <div class="item">
    <div class="image">
      <img src="uploads/';echo $rws[4];echo '">
    </div>
    <div class="content">
      <a href="viewalbum.php?id=';echo $rws[0];echo '" class="header">';echo $rws[1];echo'</a>
      <div class="meta">
        <span>';echo $rws[2];echo '</span>
      </div>
      <div class="description">
        <p></p>
      </div>
      <div class="extra">';echo $rws[5];echo'
      </div>
    </div>
  </div>';
	
}?>



</div>
		
<?php include('footer.php'); ?>	
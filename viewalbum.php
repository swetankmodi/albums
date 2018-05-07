<?php
include('dbconn.php');
if(!empty($_COOKIE['username']))
	$_SESSION['val']=$_COOKIE['username'];
if(empty($_SESSION['val']))
	header('Location:login.php');
if(empty($_REQUEST['id']))
	header('Location:myalbums.php');
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
	<a href="myalbums.php" class="item">My Albums</a>
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
<br>
<br>
<br>

	<?php
	$sql="SELECT * FROM albums WHERE id='{$_REQUEST["id"]}'";
$result=	$dbb->query($sql) or die($dbb->error);
$rws=$result->fetch_array();
$owner=$rws[3];
	?>
<div class="pusher">
  <div class="ui vertical stripe segment">
    <div class="ui right text container">
      <h3 class="ui header"><?php echo $rws[1];?></h3>
      <p><?php echo $rws[2];?></p>
     <?php
if($owner==$currentuser)
{
echo '	<a href="addphoto.php?id=';echo $_REQUEST['id']; echo '"class="ui large button">Add Photo</a>';}
?>	
    </div>
  </div>
	</div>
<div class="ui special cards">
<?php 
$sql="SELECT * FROM photos WHERE album='{$_REQUEST["id"]}'";
$result=	$dbb->query($sql) or die($dbb->error);
while($rws=$result->fetch_array())
{

 echo '<div class="card">
    <div class="blurring dimmable image">
      <div class="ui dimmer">
        <div class="content">
          <div class="center">
            <div class="ui inverted button">Delete</div>
          </div>
        </div>
      </div>
      <img src="uploads/';echo $rws[4];echo'">
    </div>
    <div class="content">
  
      <div class="meta">
        <span class="date">';echo $rws[2]; echo'</span>
      </div>
    </div>
    <div class="extra content">
      <a>
        <i class="calendar icon"></i>
        ';echo $rws[5];echo'
      </a>
    </div>
  </div>';
}

?>


<script type="text/javascript">
$(document)
    .ready(function() {
$('.special.cards .image').dimmer({
  on: 'hover'
	});});
</script>
</div>

 
<?php include('footer.php'); ?>
  

			
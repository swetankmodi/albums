<?php
include('dbconn.php');
?>
<html>
<head>
  <script>
  $(document)
    .ready(function() {
      $('.special.card .image').dimmer({
        on: 'hover'
      });
      $('.star.rating')
        .rating()
      ;
      $('.card .dimmer')
        .dimmer({
          on: 'hover'
        })
      ;
    })
  ;
  </script>
  <script type="text/javascript" src="semantic/dist/components/rating.js"></script>
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
	<a href="profile.php?user=<?php echo $_COOKIE['username1'];?>" class="active item">Profile</a>
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
<br><br>
	<title>Profile</title>
</head>
<body><br>
<strong><p align="center"><font size="10" color="blue">Profile</font> </p></strong><br><br>
<?php
  //  echo "Hello";
   //Get image data from database
    $sql="SELECT * FROM users WHERE username='{$_REQUEST['user']}'";
    		$result=	$dbb->query($sql) or die($dbb->error);
		$rws=$result->fetch_array();
    if($result->num_rows > 0){
		
    
    }else{
        echo 'Image not found...';
    }
//}
?>
</body>
<div class="ui cards">
<?php
  //  echo "Hello";
   //Get image data from database

			echo ' <div class="ui card">
    <div class="image">
      <div class="ui blurring inverted dimmer">
        <div class="content">
          <div class="center">
            <div class="ui teal button">Add Friend</div>
          </div>
        </div>
      </div>
      <img src="uploads/';echo $rws[5];echo'">
    </div>
    <div class="content">
      <div class="header">';echo $rws[0];echo'</div>
      <div class="meta">
        <a class="group">';
		echo $rws[1].' '.$rws[2]; echo '</a>
      </div>
      <div class="description">';if($rws[3]=="male"){echo 'Male';} else {echo 'Female'; }echo'</div>
    </div>
    <div class="extra content">
      <a class="right floated created">';echo $rws[7];echo '</a>
      <a class="friends">';echo $rws[4];
        echo'</a>
    </div>
  </div>';

		
		
echo "</div>";		
?>
</div>

<?php include('footer.php'); ?>
</html>
    
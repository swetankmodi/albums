<?php
include('dbconn.php');

?><html>
<head>
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
	<title>LOGIN</title>
	  <script type="text/javascript" src="semantic/dist/components/rating.js"></script>
    <link rel="stylesheet" type="text/css" href="semantic/dist/components/rating.css">
<link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
<script src="semantic/dist/semantic.min.js"></script>
</head>
  <style type="text/css">
    body {
      background-color: #DADADA;
    }
    body > .grid {
      height: 100%;
    }
    .image {
      margin-top: -100px;
    }
    .column {
      max-width: 450px;
    }
  </style>

</head>

<div class="ui middle aligned center aligned grid">
  <div class="column">
    <h2 class="ui teal image header">
      <img src="assets/images/logo.png" class="image">
      <div class="content">
        Log-in to your account
      </div>
    </h2>
    <form class="ui large form" method="POST">
      <div class="ui stacked segment">
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" name="email" placeholder="username">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" name="password" placeholder="Password">
          </div>
        </div>
		<input class="ui fluid large teal submit button" type="submit" name="submit" value="Login">
        
      </div>

      <div class="ui error message"></div>

    </form>

    <div class="ui message">
      New to us? <a href="create.php">Sign Up</a>
    </div>
  </div>
</div>
<?php 
			if(!empty($_REQUEST['submit'])&&!empty($_REQUEST['email'])&&!empty($_REQUEST['password']))
			{
				$email=$_REQUEST['email'];
				$password=md5($_REQUEST['password']);
				$sql="SELECT password FROM users WHERE username='{$email}'";
				$r=$dbb->query($sql) or die ($dbb->error);
				$rws=$r->fetch_array();//or die($dbb->error);
				if($rws[0]==$password)
				{
					$sql="SELECT * FROM users WHERE username='{$email}'";
					$r=$dbb->query($sql) or die ($dbb->error);
					$rws=$r->fetch_array();//or die($dbb->error);
					session_start();
					setcookie('username',1,time()+3600);
					setcookie('username1',$rws[0],time()+3600);
				
					
				
					header('Location:index.php');
				}
				else
					echo"Invalid Password or Username Combination";
			}
	?>
</body>

<?php include('footer.php'); ?>
</html>
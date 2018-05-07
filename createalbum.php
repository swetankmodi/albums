<?php
include('dbconn.php');
if(!empty($_COOKIE['username']))
	$_SESSION['val']=$_COOKIE['username'];
if(empty($_SESSION['val']))
	header('Location:login.php');
if(!empty($_COOKIE['username1']))
	$currentuser=$_COOKIE['username1'];
?>
<html>
  <script type="text/javascript" src="semantic/dist/components/rating.js"></script>
    <link rel="stylesheet" type="text/css" href="semantic/dist/components/rating.css">
<link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
<script src="semantic/dist/semantic.min.js"></script><head>
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
</div><br><br><br><br>
	<title>Create your Album</title>
</head>
<body>
<strong><p align="center"><font size="10" color="blue">Create Your Album</font> </p></strong><br>
	<form method='POST' enctype="multipart/form-data">
		<table align='center'>
			<tr><td>Name:</td><td><input type='text' name='name' placeholder='Enter'></td></tr>
			<tr><td>Description:</td><td><input type='text' name='description' placeholder='Enter'></td></tr>
			<tr><td>Cover Picture:</td><td><input type="file" name="cover"/></td></tr>
			<tr><td>Visibility:</td><td> <select name="visi">
  <option value="private">Private</option>
  <option value="public">Public</option>
  <option value="link">Link Only</option>
</select></td><tr> 
			<tr><td><input type='submit' name='submit' value='create'></td></tr>
			
		</table>
	</form>
	<?php 
		
				if(!empty($_REQUEST['submit'])&&!empty($_REQUEST['name']))
				{extract($_POST);
					$UploadedFileName=$_FILES["cover"]["name"];
if($UploadedFileName!='')
{
  $upload_directory = "uploads/";
  $TargetPath=time().$UploadedFileName;
  if(move_uploaded_file($_FILES['cover']['tmp_name'], $upload_directory.$TargetPath)){  
echo "<p align='center'>";
					$name=$_REQUEST['name'];
					$desc=$_REQUEST['description'];		
				$visi=$_REQUEST['visi'];											
				$sql="INSERT INTO albums VALUES (now(),'{$name}','{$desc}','{$currentuser}','{$TargetPath}',now(),'{$visi}')";
				$dbb->query($sql) or die($dbb->error);
					if($dbb->affected_rows==1)
					{	
			
						
						echo "Successfully Created the Album"."<br></p>";

					}
					else if($dbb->error)
					{
						echo "ERROR";
					}  
                   
  }
}
		
		
					
				}
			
	?>
</body>

<?php include('footer.php'); ?>
</html>

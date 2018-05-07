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
?>
<html><head>
<script type="text/javascript" src="semantic/dist/components/rating.js"></script>
    <link rel="stylesheet" type="text/css" href="semantic/dist/components/rating.css">
<link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
<script src="semantic/dist/semantic.min.js"></script>
<div class="ui inverted large top fixed menu">
  <div class="ui container">
    <a href="index.php" class="item">Home</a>
	<a href="profile.php?user=<?php echo $_COOKIE['username1'];?>" class="item">Profile</a>
	<a href="albums.php" class="active item">All Albums</a>
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
</div><br><br>
<br>
	<title>Add Photo</title>
</head>
<body><br><br>
<strong><p align="center"><font size="10" color="blue">Add Photo</font> </p></strong><br><br>
	<form method='POST' enctype="multipart/form-data">
		<table align='center'>
			<tr><td>Album Id:</td><td><?php echo $_REQUEST["id"];?></td></tr>
			<tr><td>Description:</td><td><input type='text' name='description' placeholder='Enter'></td></tr>
			<tr><td>Upload:</td><td><input type="file" name="cover"/></td></tr>
			<tr><td><input type='submit' name='submit' value='Add to Album'></td></tr>
			
		</table>
	</form>
	<?php 
		
				if(!empty($_REQUEST['submit'])&&!empty($_REQUEST['id']))
				{extract($_POST);
			
			
			$sql="SELECT * from albums where id='{$_REQUEST['id']}'";
			//echo $sql;
				$result=	$dbb->query($sql) or die($dbb->error);
				$rws=$result->fetch_array();
				if($currentuser!=$rws[3])
				{
					header('Location:myalbums.php');
				}
				else{
					$UploadedFileName=$_FILES["cover"]["name"];
if($UploadedFileName!='')
{
  $upload_directory = "uploads/";
  $TargetPath=time().$UploadedFileName;
  if(move_uploaded_file($_FILES['cover']['tmp_name'], $upload_directory.$TargetPath)){  
echo "<p align='center'>";
					$name=$_REQUEST['id'];
					$desc=$_REQUEST['description'];						
				$sql="INSERT INTO photos VALUES (now(),'{$name}','{$desc}','{$currentuser}','{$TargetPath}',now())";
				$dbb->query($sql) or die($dbb->error);
					if($dbb->affected_rows==1)
					{	
			
						
						echo "Successfully Added to Album"."<br></p>";

					}
					else if($dbb->error)
					{
						echo "ERROR";
					}  
                   
  }
}
		
		
					
				}
				}
	?>
</body>

</html>

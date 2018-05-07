<?php
include('dbconn.php');

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
<div class="ui inverted large top fixed menu">
  <div class="ui container">
    <a href="index.php" class="item">Home</a>
	<a href="albums.php" class="item">All Albums</a>
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
<br><br><br><br>
	<title>Create your Account</title>
</head>
<body>
<strong><p align="center"><font size="10" color="blue">Create Your Account</font> </p></strong><br>
	<form method='POST' enctype="multipart/form-data">
		<table align='center'>
			<tr><td>Username:</td><td><input type='text' name='username' placeholder='Enter'></td></tr>
			<tr><td>First Name:</td><td><input type='text' name='first_name' placeholder='Enter'></td></tr>
			<tr><td>Last Name:</td><td><input type='text' name='last_name' placeholder='Enter'></td></tr>
<tr><td>Gender:</td><td> <select name="gender">
  <option value="male">Male</option>
  <option value="female">Female</option>
  <option value="others">Others</option>
</select></td><tr> 
			<tr><td>Email:</td><td><input type='text' name='email' placeholder='Enter'></td></tr>
			<tr><td>Profile Picture:</td><td><input type="file" name="profilepicture"/></td></tr>
			<tr><td>Password:</td><td><input type='password' name='password' placeholder='Enter'></td></tr>
			<tr><td><input type='submit' name='submit' value='create'></td></tr>
			
		</table>
	</form>
	<?php 
		
				if(!empty($_REQUEST['submit'])&&!empty($_REQUEST['username'])&&!empty($_REQUEST['first_name'])&&!empty($_REQUEST['last_name'])&&!empty($_REQUEST['gender'])&&!empty($_REQUEST['email'])&&!empty($_REQUEST['password']))
				{extract($_POST);
					$UploadedFileName=$_FILES["profilepicture"]["name"];
if($UploadedFileName!='')
{
  $upload_directory = "uploads/";
  $TargetPath=time().$UploadedFileName;
  if(move_uploaded_file($_FILES['profilepicture']['tmp_name'], $upload_directory.$TargetPath)){  
echo "<p align='center'>";
					$username=$_REQUEST['username'];
					$fname=$_REQUEST['first_name'];
					$lname=$_REQUEST['last_name'];
					$gender=$_REQUEST['gender'];
					$email=$_REQUEST['email'];
					$password=md5($_REQUEST['password']);
					//password in md5 format for security breaches. could have used bcrypt too
		
					
				$sql="INSERT INTO users VALUES ('{$username}','{$fname}','{$lname}','{$gender}',
				'{$email}','{$TargetPath}','{$password}',now())";
				$dbb->query($sql) or die($dbb->error);
					if($dbb->affected_rows==1)
					{	
			
						
						echo "Successfully Registered"."<br></p>";

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

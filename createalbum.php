<?php
include ('dist/header.php');
?>
<html>
<title>Create your Album</title>
</head>

<body>
	<strong><p align="center"><font size="10" color="blue">Create Your Album</font> </p></strong><br>
	<form method='POST' enctype="multipart/form-data">
		<table align='center'>
			<tr>
				<td>Name:</td>
				<td><input type='text' required="required" name='name' placeholder='Enter'></td>
			</tr>
			<tr>
				<td>Description:</td>
				<td><input type='text' name='description' placeholder='Enter'></td>
			</tr>
			<tr>
				<td>Cover Picture:</td>
				<td><input type="file" required="required" name="cover" /></td>
			</tr>
			<tr>
				<td>Visibility:</td>
				<td> <select name="visi">
					  <option value="private">Private</option>
					  <option value="public">Public</option>
					  <option value="link">Link Only</option>
					</select></td>
				<tr>
					<tr>
						<td><input type='submit' name='submit' value='create'></td>
					</tr>

		</table>
	</form>
	<?php
include ('dist/functions/albums/createAlbum.php');
?>
</body>

<?php include ('footer.php'); ?>

</html>
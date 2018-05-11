<?php
include ('dbconn.php');
?>
<html>

<head>
    <div class="ui inverted large top fixed menu">
        <div class="ui container">
            <a href="index.php" class="item">Home</a>
            <a href="albums.php" class="item">All Albums</a>
            <a href="users.php" class="item">Users</a>
            <div class="right menu">
                <?php
include ('dist/functions/html/navbarInvert.php');
?>
            </div>
        </div>
    </div>
    <br><br><br><br>
    <title>Create your Account</title>
</head>

<body>
    <strong><p align="center"><font size="10" color="blue">Create Your Account</font> </p></strong><br>
    <form name="Register" onsubmit="return validateForm()" method='POST' enctype="multipart/form-data">
        <table align='center'>
            <tr>
                <td>Username:</td>
                <td><input type='text' required="required" name='username' placeholder='Enter'></td>
            </tr>
            <tr>
                <td>First Name:</td>
                <td><input type='text' required="required" name='first_name' placeholder='Enter'></td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td><input type='text' required="required" name='last_name' placeholder='Enter'></td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td> <select name="gender">
					  <option value="male">Male</option>
					  <option value="female">Female</option>
					  <option value="others">Others</option>
					</select></td>
                <tr>
                    <tr>
                        <td>Email:</td>
                        <td><input type='text' required="required" name='email' placeholder='Enter'></td>
                    </tr>
                    <tr>
                        <td>Profile Picture:</td>
                        <td><input type="file" required="required" name="profilepicture" /></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type='password' required="required" name='password' placeholder='Enter'></td>
                    </tr>
                    <tr>
                        <td><input type='submit' name='submit' value='create'></td>
                    </tr>

        </table>
    </form>

</body>
<script src="dist/js/validate.js"></script>
<?php 
include ('dist/functions/users/createUser.php');
include ('footer.php'); ?>

</html>
<?php
include ('dist/header.php');
if (empty($_REQUEST['user'])) header('Location:index.php');
include ('dist/functions/users/isValidUser.php');
?>
    <html>
    <title>Edit Your Profile</title>
    </head>

    <body>
        <strong><p align="center"><font size="10" color="blue">Edit Your Profile</font> </p></strong><br>
        <form name="Register" onsubmit="return validateForm()" method='POST' enctype="multipart/form-data">
            <table align='center'>
                <tr>
                    <td>Username:</td>
                    <td>
                        <?php echo $rws[0]; ?>
                    </td>
                </tr>
                <tr>
                    <td>First Name:</td>
                    <td><input type='text' name='first_name' value="<?php echo $rws[1] ?>"></td>
                </tr>
                <tr>
                    <td>Last Name:</td>
                    <td><input type='text' name='last_name' value="<?php echo $rws[2] ?>"></td>
                </tr>
                <tr>
                    <td>Gender:</td>
                    <td> <select name="gender">
<?php
include ('dist/functions/html/editGender.php');
?>
						</select></td>
                    <tr>
                        <tr>
                            <td>Email:</td>
                            <td><input type='text' name='email' value="<?php echo $rws[4] ?>"></td>
                        </tr>
                        <tr>
                            <td>Profile Picture:</td>
                            <td><input type="file" name="profilepicture" /></td>
                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td><input type='password' name='password' placeholder='Enter'></td>
                        </tr>
                        <tr>
                            <td><input type='submit' onsubmit="return validateForm()" name='submit' value='create'></td>
                        </tr>

            </table>
        </form>

    </body>
    <?php
include ('dist/functions/users/editUser.php');
include ('footer.php'); ?>
        <script src="dist/js/editprofile.js"></script>

    </html>
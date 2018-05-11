<?php
include ('dist/header.php');
if (empty($_REQUEST['id'])) header('Location:myalbums.php');
?>
<?php
include ('dist/functions/photos/isAlbumOwner.php');
?>
<html>

<head>
    <title>Add Photo</title>
</head>

<body><br><br>
    <strong><p align="center"><font size="10" color="blue">Add Photo</font> </p></strong><br><br>
    <form method='POST' enctype="multipart/form-data">
        <table align='center'>
            <tr>
                <td>Album Id:</td>
                <td>
                    <?php echo $_REQUEST["id"]; ?>
                </td>
            </tr>
            <tr>
                <td>Description:</td>
                <td><input type='text' name='description' placeholder='Enter'></td>
            </tr>
            <tr>
                <td>Upload:</td>
                <td><input type="file" required="required" name="cover" /></td>
            </tr>
            <tr>
                <td><input type='submit' name='submit' value='Add to Album'></td>
            </tr>

        </table>
    </form>
    <?php
	include ('dist/functions/photos/addPhoto.php');
?>
</body>

</html>

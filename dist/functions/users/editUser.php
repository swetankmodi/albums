<?php
include ('compress.php');
if (!empty($_REQUEST['submit']))
  {
    $ok = 0;
    extract($_POST);
    $UploadedFileName = $_FILES["profilepicture"]["name"];
    if ($UploadedFileName != '')
      {
        $upload_directory = "uploads/";
        $TargetPath = time() . $UploadedFileName . '.jpg';
        if (($_FILES["profilepicture"]["type"] == "image/gif") || ($_FILES["profilepicture"]["type"] == "image/jpeg") || ($_FILES["profilepicture"]["type"] == "image/png") || ($_FILES["profilepicture"]["type"] == "image/pjpeg"))
          {

            $url = $upload_directory . $TargetPath;
            $filename = compress_image($_FILES["profilepicture"]["tmp_name"], $url, 60);

            echo "<p align='center'>";
            $username = $dbb->real_escape_string($_REQUEST['user']);
            $fname = $dbb->real_escape_string($_REQUEST['first_name']);
            $lname = $dbb->real_escape_string($_REQUEST['last_name']);
            $gender = $dbb->real_escape_string($_REQUEST['gender']);
            $email = $dbb->real_escape_string($_REQUEST['email']);

            $sql = "UPDATE users set profile_picture='{$TargetPath}', first_name='{$fname}' ,last_name='{$lname}' ,gender='{$gender}' ,email='{$email}' where username='{$currentuser}'";
            $dbb->query($sql) or die($dbb->error);
            if ($dbb->affected_rows == 1)
              {
                $ok = 1;

              }
            else if ($dbb->error)
              {
                echo "ERROR";
              }

          }
        else
          {
            echo "Error" . "<br></p>";
          }
      }
    else
      {
        $username = $dbb->real_escape_string($_REQUEST['user']);
        $fname = $dbb->real_escape_string($_REQUEST['first_name']);
        $lname = $dbb->real_escape_string($_REQUEST['last_name']);
        $gender = $dbb->real_escape_string($_REQUEST['gender']);
        $email = $dbb->real_escape_string($_REQUEST['email']);

        $sql = "UPDATE users set first_name='{$fname}' ,last_name='{$lname}' ,gender='{$gender}' ,email='{$email}' where username='{$currentuser}'";
        $dbb->query($sql) or die($dbb->error);
        if ($dbb->affected_rows == 1)
          {
            $ok = 1;
            $redirect = 'Location:profile.php?user=' . $currentuser;
            header($redirect);
            echo "Successfully Updated" . "<br></p>";

          }
        else if ($dbb->error)
          {
            echo "ERROR";
          }

      }
    if (!empty($_REQUEST['password']))
      {
        $pass = md5($_REQUEST['password']);
        $sql = "UPDATE users set password='{$pass}' where username='{$currentuser}'";
        $dbb->query($sql) or die($dbb->error);
        if ($dbb->affected_rows == 1)
          {
            $ok = 1;
            $redirect = 'Location:profile.php?user=' . $currentuser;
            header($redirect);
            echo "Successfully Updated" . "<br></p>";

          }
        else if ($dbb->error)
          {
            echo "ERROR";
          }
      }
    if ($ok == 1)
      {
        $redirect = 'Location:profile.php?user=' . $currentuser;
        header($redirect);
      }
  }

?>
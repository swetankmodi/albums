<?php
include ('compress.php');
if (!empty($_REQUEST['submit']) && !empty($_REQUEST['username']) && !empty($_REQUEST['first_name']) && !empty($_REQUEST['last_name']) && !empty($_REQUEST['gender']) && !empty($_REQUEST['email']) && !empty($_REQUEST['password']))
  {
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
            $username = $dbb->real_escape_string($_REQUEST['username']);
            $fname = $dbb->real_escape_string($_REQUEST['first_name']);
            $lname = $dbb->real_escape_string($_REQUEST['last_name']);
            $gender = $dbb->real_escape_string($_REQUEST['gender']);
            $email = $dbb->real_escape_string($_REQUEST['email']);
            $password = md5($_REQUEST['password']);

            $sql = "INSERT INTO users VALUES ('{$username}','{$fname}','{$lname}','{$gender}',
									'{$email}','{$TargetPath}','{$password}',now())";
            $dbb->query($sql) or die($dbb->error);
            if ($dbb->affected_rows == 1)
              {

                echo "Successfully Registered" . "<br></p>";

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

  }

?>
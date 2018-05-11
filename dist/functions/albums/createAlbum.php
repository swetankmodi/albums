<?php
include ('compress.php');
if (!empty($_REQUEST['submit']) && !empty($_REQUEST['name']))
  {
    extract($_POST);
    $UploadedFileName = $_FILES["cover"]["name"];
    if ($UploadedFileName != '')
      {
        $upload_directory = "uploads/";
        $TargetPath = time() . $UploadedFileName . '.jpg';
        if (($_FILES["cover"]["type"] == "image/gif") || ($_FILES["cover"]["type"] == "image/jpeg") || ($_FILES["cover"]["type"] == "image/png") || ($_FILES["cover"]["type"] == "image/pjpeg"))
          {
            $url = $upload_directory . $TargetPath;
            $filename = compress_image($_FILES["cover"]["tmp_name"], $url, 60);
            echo "<p align='center'>";
            
            $name = $dbb->real_escape_string($_REQUEST['name']);
            $desc = $dbb->real_escape_string($_REQUEST['description']);
            $albumid = date('Yhistis');
            $visi = $dbb->real_escape_string($_REQUEST['visi']);
            $sql = "INSERT INTO albums VALUES ('{$albumid}','{$name}','{$desc}','{$currentuser}','{$TargetPath}',now(),'{$visi}')";
            $dbb->query($sql) or die($dbb->error);
            if ($dbb->affected_rows == 1)
              {

                echo "Successfully Created the Album" . "<br></p>";
                $redirect = 'Location:viewalbum.php?id=' . $albumid;
                header($redirect);

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
        echo "Error" . "<br></p>";
      }
  }

?>
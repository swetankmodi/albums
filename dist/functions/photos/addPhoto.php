<?php
include ('compress.php');
if (!empty($_REQUEST['submit']) && !empty($_REQUEST['id']))
  {
    extract($_POST);
	$albumid=$dbb->real_escape_string($_REQUEST["id"]);
    $sql = "SELECT * from albums where id='{$albumid}'";
    //echo $sql;
    $result = $dbb->query($sql) or die($dbb->error);
    $rws = $result->fetch_array();
    if ($currentuser != $rws[3])
      {
        header('Location:myalbums.php');
      }
    else
      {
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
                $name = $dbb->real_escape_string($_REQUEST['id']);
                $desc = $dbb->real_escape_string($_REQUEST['description']);
                $sql = "INSERT INTO photos VALUES (now(),'{$name}','{$desc}','{$currentuser}','{$TargetPath}',now())";
                $dbb->query($sql) or die($dbb->error);
                if ($dbb->affected_rows == 1)
                  {
                    echo "Successfully Added to Album" . "<br></p>";
                  }
                else if ($dbb->error)
                  {
                    echo "ERROR";
                  }

              }
          }

      }
  }
?>
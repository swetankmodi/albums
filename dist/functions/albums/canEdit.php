<?php
if ($owner == $currentuser)
  {
    echo '	<a href="addphoto.php?id=';
    echo $_REQUEST['id'];
    echo '"class="ui large button">Add Photo</a>';
    echo '	<a href="deletealbum.php?id=';
    echo $_REQUEST['id'];
    echo '"class="ui large button">Delete Album</a>';
  }
?>	
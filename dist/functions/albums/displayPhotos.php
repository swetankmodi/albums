<?php
$albumid=$dbb->real_escape_string($_REQUEST["id"]);
$sql = "SELECT * FROM photos WHERE album='{$albumid}'";
$result = $dbb->query($sql) or die($dbb->error);
while ($rws = $result->fetch_array())
  {

    echo '<div class="card">
    <div class="blurring dimmable image">
      <div class="ui dimmer">
        <div class="content">
          <div class="center">
            <div class="ui inverted button">Delete</div>
          </div>
        </div>
      </div>
     <a href="uploads/';
    echo $rws[4];
    echo '" data-lightbox="roadtrip"> <img height="300" width="290"  src="uploads/';
    echo $rws[4];
    echo '"></a>
    </div>
    <div class="content">
  
      <div class="meta">
        <span class="date">';
    echo $rws[2];
    echo '</span>
      </div>
    </div>
    <div class="extra content">
      <a>
        <i class="calendar icon"></i>
        ';
    echo $rws[5];
    echo '
      </a>
    </div>';
    if ($owner == $currentuser)
      {

        echo '<a href="deletephoto.php?id=';
        echo $rws[0];
        echo '"> <button class="right floated negative ui button">Delete	</button></a>';
      }
    echo '
  </div>';
  }

?>

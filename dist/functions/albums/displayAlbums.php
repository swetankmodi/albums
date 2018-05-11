<?php
$sql = "SELECT * FROM albums WHERE visibility='public'";
$result = $dbb->query($sql) or die($dbb->error);
while ($rws = $result->fetch_array())
  {

    echo '<div class="card">
    <div class="blurring dimmable image">
      <div class="ui dimmer">
        <div class="content">
          <div class="center">
            <a href="viewalbum.php?id=';
    echo $rws[0];
    echo '" class="ui inverted button">View</a>
          </div>
        </div>
      </div>
      <img src="uploads/';
    echo $rws[4];
    echo '">
    </div>
    <div class="content">
      <a href="viewalbum.php?id=';
    echo $rws[0];
    echo '" class="header">';
    echo $rws[1];
    echo '</a>
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
    </div>
  </div>';
  }

?>
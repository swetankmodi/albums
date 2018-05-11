<?php
$sql = "SELECT * FROM albums WHERE user='{$currentuser}'";
$result = $dbb->query($sql) or die($dbb->error);
while ($rws = $result->fetch_array())
  {
    echo ' <div class="item">
    <div class="image">
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
        <span>';
    echo $rws[2];
    echo '</span>
      </div>
      <div class="description">
        <p></p>
      </div>
      <div class="extra">';
    echo $rws[5];
    echo '
      </div>
    </div>
  </div>';

  } 
?>
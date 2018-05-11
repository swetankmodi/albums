<?php
$sql = "SELECT * FROM users";
$result = $dbb->query($sql) or die($dbb->error);
$ctr = 0;
$rws = "";
while ($rws = $result->fetch_array())
  {
    echo ' <div class="ui card">
    <div class="image">
      <div class="ui blurring inverted dimmer">
        <div class="content">
          <div class="center">
            <div class="ui teal button">Add Friend</div>
          </div>
        </div>
		
      </div>
	   <a href="uploads/';
    echo $rws[5];
    echo '" data-lightbox="';
    echo $rws[1];
    echo '"> <img height="300" width="290"  src="uploads/';
    echo $rws[5];
    echo '"></a>

    </div>
    <div class="content">
      <a href="profile.php?user=';
    echo $rws[0];
    echo '" class="header">';
    echo $rws[0];
    echo '</a>
      <div class="meta">
        <a class="group">';
    echo $rws[1] . ' ' . $rws[2];
    echo '</a>
      </div>
      <div class="description">';
    if ($rws[3] == "male")
      {
        echo 'Male';
      }
    else
      {
        echo 'Female';
      }
    echo '</div>
    </div>
    <div class="extra content">
      <a class="right floated created">';
    echo $rws[7];
    echo '</a>
      <a class="friends">';
    echo $rws[4];
    echo '</a>
    </div>
  </div>';

  }
echo "</div>";
?>
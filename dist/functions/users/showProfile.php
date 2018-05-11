<?php
			echo ' <div class="ui card">
    <div class="image">
      <div class="ui blurring inverted dimmer">
        <div class="content">
          <div class="center">
            <div class="ui teal button">Add Friend</div>
          </div>
        </div>
      </div>
	   <a href="uploads/';echo $rws[5];echo'" data-lightbox="roadtrip"> <img height="300" width="290"  src="uploads/';echo $rws[5];echo'"></a>
    </div>
    <div class="content">
      <div class="header">';echo $rws[0];echo'</div>
      <div class="meta">
        <a class="group">';
		echo $rws[1].' '.$rws[2]; echo '</a>
      </div>
      <div class="description">';if($rws[3]=="male"){echo 'Male';} else {echo 'Female'; }echo'</div>
    </div>
    <div class="extra content">
      <a class="right floated created">';echo $rws[7];echo '</a>
      <a class="friends">';echo $rws[4];
        echo'</a>
    </div>';
if($currentuser==$_REQUEST['user'])
{
			echo '<a href="editprofile.php?user=';echo $currentuser;echo '"> <button class="right floated ui button">Edit	</button></a>';
}
	echo '
  </div>';
echo "</div>";		
?>
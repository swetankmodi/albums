<?php
include('dbconn.php');
if(!empty($_COOKIE['username']))
	$_SESSION['val']=$_COOKIE['username'];
if(empty($_SESSION['val']))
	header('Location:login.php');

if(!empty($_COOKIE['username1']))
	$currentuser=$_COOKIE['username1'];
?>

<html>
<head>
<br><br><br>
<link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
<script src="semantic/dist/semantic.min.js"></script>
 <style type="text/css">

    .hidden.menu {
      display: none;
    }

    .masthead.segment {
      min-height: 700px;
      padding: 1em 0em;
    }
    .masthead .logo.item img {
      margin-right: 1em;
    }
    .masthead .ui.menu .ui.button {
      margin-left: 0.5em;
    }
    .masthead h1.ui.header {
      margin-top: 3em;
      margin-bottom: 0em;
      font-size: 4em;
      font-weight: normal;
    }
    .masthead h2 {
      font-size: 1.7em;
      font-weight: normal;
    }

    .ui.vertical.stripe {
      padding: 8em 0em;
    }
    .ui.vertical.stripe h3 {
      font-size: 2em;
    }
    .ui.vertical.stripe .button + h3,
    .ui.vertical.stripe p + h3 {
      margin-top: 3em;
    }
    .ui.vertical.stripe .floated.image {
      clear: both;
    }
    .ui.vertical.stripe p {
      font-size: 1.33em;
    }
    .ui.vertical.stripe .horizontal.divider {
      margin: 3em 0em;
    }

    .quote.stripe.segment {
      padding: 0em;
    }
    .quote.stripe.segment .grid .column {
      padding-top: 5em;
      padding-bottom: 5em;
    }

    .footer.segment {
      padding: 5em 0em;
    }

    .secondary.pointing.menu .toc.item {
      display: none;
    }

    @media only screen and (max-width: 700px) {
      .ui.fixed.menu {
        display: none !important;
      }
      .secondary.pointing.menu .item,
      .secondary.pointing.menu .menu {
        display: none;
      }
      .secondary.pointing.menu .toc.item {
        display: block;
      }
      .masthead.segment {
        min-height: 350px;
      }
      .masthead h1.ui.header {
        font-size: 2em;
        margin-top: 1.5em;
      }
      .masthead h2 {
        margin-top: 0.5em;
        font-size: 1.5em;
      }
    }


  </style>
   <script>
  $(document)
    .ready(function() {

      // fix menu when passed
      $('.masthead')
        .visibility({
          once: true,
          onBottomPassed: function() {
            $('.fixed.menu').transition('fade out');
          },
          onBottomPassedReverse: function() {
            $('.fixed.menu').transition('fade in');
          }
        })
      ;

      // create sidebar and attach to menu open
      $('.ui.sidebar')
        .sidebar('attach events', '.toc.item')
      ;

    })
  ;
  </script>
	<title>Users</title>
</head>
<div class="ui large inverted top fixed menu">
  <div class="ui container">
    <a href="index.php" class="item">Home</a>
	<a href="profile.php?user=<?php echo $_COOKIE['username1'];?>" class="item">Profile</a>
	<a href="albums.php" class="item">All Albums</a>
	<a href="myalbums.php" class="item">My Albums</a>
	<a href="#" class="active item">Users</a>
    <div class="right menu">
	<?php if(empty($_COOKIE['username1']))
	{
		echo'
      <div class="item">
        <a href="login.php" class="ui button">Log in</a>
      </div>
      <div class="item">
        <a href = "create.php" class="ui primary button">Sign Up</a>
	</div>';}
	else
		echo '<a href="logout.php" class="ui primary button">Log Out</a>';
?>
    </div>
  </div>
</div>
<body>
</body>
<div class="ui cards">
 


<?php
  //  echo "Hello";
   //Get image data from database
    $sql="SELECT * FROM users";
    		$result=	$dbb->query($sql) or die($dbb->error);
			$ctr=0;
			$rws="";
		while($rws=$result->fetch_array())
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
      <img src="uploads/';echo $rws[5];echo'">
    </div>
    <div class="content">
      <a href="profile.php?user=';echo $rws[0]; echo '" class="header">';echo $rws[0];echo'</a>
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
    </div>
  </div>';

			
		}
echo "</div>";		
?>


<script type="text/javascript">
$(document)
    .ready(function() {
$('.cards .image').dimmer({
  on: 'hover'
	});});
</script>

<?php include('footer.php'); ?>
</html>
    
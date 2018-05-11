<?php include ('dbconn.php');
if (!empty($_COOKIE['username1'])) $_SESSION['username'] = $_COOKIE['username'];
?>
<html>
<link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
<link rel="stylesheet" type="text/css" href="dist/css/home.css">

<body>

    <!-- Following Menu -->
    <div class="ui large top fixed hidden menu">
        <div class="ui container">
            <a href="#" class="active item">Home</a>
            <a href="albums.php" class="item">Albums</a>
            <a href="users.php" class="item">Users</a>
            <div class="right menu">
                <?php 
include ('dist/functions/html/followingMenuLogin.php');
?>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <div class="ui vertical inverted sidebar menu">
        <a href="index.php" class="active item">Home</a>

        <?php 
include ('dist/functions/html/sidebarLogin.php');
?>
        <a href="albums.php" class="item">Albums</a>
        <a href="users.php" class="item">Users</a>
    </div>


    <!-- Page Contents -->
    <div class="pusher">
        <div class="ui inverted vertical masthead center aligned segment">

            <div class="ui container">
                <div class="ui large secondary inverted pointing menu">
                    <a class="toc item">
          <i class="sidebar icon"></i>
        </a>
                    <a href="#" class="active item">Home</a>
                    <a href="albums.php" class="item">Albums</a>
                    <a href="users.php" class="item">Users</a>
                    <div class="right item">
                        <?php 
include ('dist/functions/html/navbarLogin.php');
?>
                    </div>
                </div>
            </div>

            <div class="ui text container">
                <h1 class="ui inverted header">
                    Chef's Gallery
                </h1>
                <h2>Share whatever you want to.</h2>
                <a href="myalbums.php" class="ui huge primary button">Get Started <i class="right arrow icon"></i></a>
            </div>

        </div>



        <div class="ui vertical stripe quote segment">
            <div class="ui equal width stackable internally celled grid">
                <div class="center aligned row">
                    <div class="column">
                        <h3>"What a Website"</h3>
                        <p>That is what they all say about us</p>
                    </div>
                    <div class="column">
                        <h3>"I shouldn't have gone with their competitor."</h3>
                        <p>
                            <img src="assets/images/avatar/nan.jpg" class="ui avatar image"> <b>Chef</b> Modi
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="ui vertical stripe segment">
            <div class="ui text container">
                <h3 class="ui header">Breaking The Grid, Grabs Your Attention</h3>
                <p>Instead of focusing on content creation and hard work, we have learned how to master the art of doing nothing by providing massive amounts of whitespace and generic content that can seem massive, monolithic and worth your attention.</p>
                <a class="ui large button">Read More</a>
            </div>
        </div>


        <div class="ui inverted vertical footer segment">
            <div class="ui container">
                <div class="ui stackable inverted divided equal height stackable grid">
                    <div class="three wide column">
                        <h4 class="ui inverted header">About</h4>
                        <div class="ui inverted link list">
                            <a href="#" class="item">Sitemap</a>
                            <a href="#" class="item">Contact Us</a>
                            <a href="#" class="item">Users</a>
                            <a href="#" class="item">Albums</a>
                        </div>
                    </div>
                    <div class="three wide column">
                        <h4 class="ui inverted header">Services</h4>
                        <div class="ui inverted link list">
                            <a href="#" class="item">Albums</a>
                            <a href="#" class="item">Photos</a>
                            <a href="#" class="item">How To Access</a>
                            <a href="#" class="item">Users</a>
                        </div>
                    </div>
                    <div class="seven wide column">
                        <h4 class="ui inverted header">Hello CodeChef</h4>
                        <p>We have terabytes of space.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script src="semantic/dist/semantic.min.js"></script>
<script src="dist/js/masthead.js"></script>

</html>
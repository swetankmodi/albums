<?php
include ('dbconn.php');
?>
    <html>
    <link rel="stylesheet" type="text/css" href="dist/css/login.css">

    <head>
        <div class="ui large inverted top fixed menu">
            <div class="ui container">
                <a href="index.php" class="item">Home</a>
                <a href="profile.php?user=<?php echo $_COOKIE['username1']; ?>" class="item">Profile</a>
                <a href="albums.php" class="item">All Albums</a>
                <a href="myalbums.php" class="item">My Albums</a>
                <a href="users.php" class="item">Users</a>
                <div class="right menu">
                    <?php 
include ('dist/functions/html/loginToggle.php');
?>
                </div>
            </div>
        </div>
        <title>LOGIN</title>
    </head>
    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <h2 class="ui teal image header">
                <img src="assets/images/logo.png" class="image">
                <div class="content">
                    Log-in to your account
                </div>
            </h2>
            <form class="ui large form" method="POST">
                <div class="ui stacked segment">
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            <input type="text" required="required" name="email" placeholder="username">
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input type="password" required="required" name="password" placeholder="Password">
                        </div>
                    </div>
                    <input class="ui fluid large teal submit button" type="submit" name="submit" value="Login">

                </div>

                <div class="ui error message"></div>

            </form>

            <div class="ui message">
                New to us? <a href="create.php">Sign Up</a>
            </div>
        </div>
    </div>
    <?php
include ('dist/functions/users/login.php');
?>
        </body>
        <?php include ('footer.php'); ?>

    </html>
<?php

session_start();
include("cookiescheck.php");
include("global_checks.php");
if(isset($_SESSION['loggedin']))
{	
} else {
	header("Location: index.php");
	exit;
}
?>

<!DOCTYPE htmlPUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Auctions! - MyPage</title>
        <link rel="stylesheet" type="text/css" href="templates.css">
		<script type="text/javascript" src="Js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="Js/jquery.validate.js"></script>
    </head>
    <body>
    	<?php include("title.php"); ?>
        <div id="container">
            
			<div id="navigationBar">
                <ul id="myMenu">
                	<li style="word-wrap: break-word">User: <?php
                	echo $_SESSION['user'];
                	?></li>
                	<li></li>
                    <li  style="background-color:white;"><a href="user.php">>Home</a></li>
                    <li><a href="user_valid_bids.php">Your valid bids</a></li>
                    <li><a href="user_items.php">Your items</a></li>
                    <li><a href="sell.php">Sell</a></li>
                    <li><a href="bid.php">Bid</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
           <?php
            		if(isset($_GET['needtologout'])){
            			echo '<p class="error">Logout before register a new user</p>';
						
            		}
					if(isset($_GET['logintry'])){
            			echo '<p class="error">Logout before login with a new username</p>';
						
            		}
            ?>
           
                <div id="myContent">
                    
                    <p class="welcome">Welcome to your personal page</p>
                    <p class="welcome">
                    <?php
                	echo $_SESSION['user'];
                	?>
                	</p>
                	<p class="instructions">Choose an action from the menu on the left<p>
                </div>
       </body>
</html>


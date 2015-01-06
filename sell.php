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


<html>
    <head>
       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Auctions</title>
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
                       <li><a href="user.php">Home</a></li>
                    <li><a href="user_valid_bids.php">Your valid bids</a></li>
                    <li><a href="user_items.php">Your items</a></li>
                    <li style="background-color:white;"><a href="sell.php">>Sell</a></li>
                    <li><a href="bid.php">Bid</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
                </ul>
            </div>
            <?php
            if(isset($_GET['error'])){
            			echo '<p class="error">Something wrong happened...</p>';
						
            		}
					if(isset($_GET['errorname'])){
            			echo '<p class="error">Error: item name already existing... Please choose a new one.</p>';
						
            		}
					if(isset($_GET['errorinvalid'])){
            			echo '<p class="error">Invalid starting bid entered</p>';
						
            		}
					if(isset($_GET['errornodata'])){
            			echo '<p class="error">No data inserted</p>';
						
            		}
					if(isset($_GET['errorwrongnum'])){
            			echo '<p class="error">Wrong starting price inserted</p>';
						
            		}
            ?>
            <div id="myContent">
            	<form id="myRegistration" action="new_item.php" method="post">
                   <label for="itemname">Item name</label><input id="itemname" class="sellbox" type="text" placeholder="Insert item name" style="font-size:1em;" name="itemname" required="required">
                   <br>
                   <label for="itemprice">Price (optional)</label><input id="itemprice" class="sellbox" type="number" step=".01" placeholder="Insert item price (optional)" style="font-size:1em;" name="itemprice">
          		 	<br>
          		 <input id="myinput" style="float:right;"type="submit" value="Submit">
                </form>
			</div>
	</body>
</html>
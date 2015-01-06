<?php
session_start();

include("cookiescheck.php");
include("global_checks.php");

if(isset($_SESSION['loggedin']))
{
		header("Location: user.php");
		exit;
}	
?>

<!DOCTYPE htmlPUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">

<html>
    <head>
       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Auctions - Main Page</title>
        <link rel="stylesheet" type="text/css" href="templates.css">   
        <script type="text/javascript" src="Js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="Js/jquery.validate.js"></script> 
    </head>
    <body>
        <?php include("title.php"); ?>
        <div id="container">
        	<div id="navigationBar">
                <ul id="myMenu">
                    <li>Welcome Guest!</li>
                    <li></li>
                    <li style="background-color:white;"><a href="index.php">>Login</a></li>
                    <li><a href="registration.php">Registration</a></li>
                </ul>
            	</div>
            	<div id="myContent">
            	<?php
            		if(isset($_GET['nologgedalready'])){
            			echo '<p class="error">Cannot logout... You were not logged in!</p>';
						
            		}
					if(isset($_GET['logoutok'])){
            			echo '<p class="confirm">Logged out!</p>';
			
            		}
					if(isset($_GET['connexpired'])){
            			echo '<p class="error">Connection expired</p>';
					
            		}
            		if(isset($_GET['registered'])){
            			echo '<p class="confirm">Correclty registered. Please, login</p>';
					
            		}
					if(isset($_GET['alreadyreg'])){
            			echo '<p class="error">User already registered. Login now</p>';
					
            		}
            		if(isset($_GET['dbunreachable'])){
            			echo '<p class="error">Database seems unreachable right now</p>';
					
            		}
					if(isset($_GET['alreadyloggedin'])){
            			echo '<p class="error">You were already logged in. A logout has been performed</p>';
					
            		}
					if(isset($_GET['wrongform'])){
            			echo '<p class="error">Complete the login form properly</p>';
					
            		}
					if(isset($_GET['invalidup'])){
            			echo '<p class="error">Wrong username or password</p>';
					
            		}
					if(isset($_GET['useralreadyin'])){
            			echo '<p class="error">You were logged in already</p>';
					
            		}
            	?>
                <p class="welcome">Welcome to Auctions!</p>
                <p class="instructions">Please login to start or click the button below to look at the bids as a guest<p>
                <div id="showbutton">
                	<a href="logout_items.php"><button style:"position: absolute; top: 50%;">Look at the bids as guest!</button></a>
                </div>
                
                	<form id="myform" method="post" name="login" action="login.php">
                    Username (email): <input type="text" required="required" placeholder="Enter your username" name="username" id="username" >
                    <br>
                    Password: <input type="password" required="required" placeholder="Enter your password" name="password" id="password">
					<br>
                    <input  type="submit" name="submit" value="Login" style="float:left; margin-top: 1.1em;" >
                    <br>
                	</form>
                	
                <div id="linkreg">
                    <a href="registration.php">Registration</a>
                </div>   
               </div>
               </div>
               
           </body>
</html>
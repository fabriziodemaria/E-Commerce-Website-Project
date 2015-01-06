<?php
session_start();
include("cookiescheck.php");
include("global_checks.php");
if(isset($_SESSION['loggedin']))
{
	include("global_checks.php");	
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
                    <li><a href="sell.php">Sell</a></li>
                    <li style="background-color:white;"><a href="bid.php">>Bid</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
            
            <?php
            		if(isset($_GET['correctbid'])){
            			echo '<p class="confirm">Correclty bid! Look at your bid in section "Your valid bids"</p>';
						
            		}
					if(isset($_GET['error'])){
            			echo '<p class="error">Something wrong happened... Retry</p>';
						
            		}
					if(isset($_GET['errorbidlow'])){
            			echo '<p class="error">You have to insert a bid higher than the current one</p>';
						
            		}
					if(isset($_GET['invalidtext'])){
            			echo '<p class="error">Invalid bid.</p>';
						
            		}
					if(isset($_GET['errornoinput'])){
            			echo '<p class="error">No bid has been inserted!</p>';
						
            		}
					if(isset($_GET['maxbid'])){
            			echo '<p class="error">Your bid is too high! Max value: 1 billion</p>';
						
            		}
            ?>
            
            <div id="myContent">
				<?php
					include("connection.php");
					$username = $_SESSION['user'];
					$result = mysqli_query($conn,"SELECT * FROM Goods WHERE Owner != '" . $username . "' AND (HBid_Author != '" . $_SESSION['user'] ."' OR HBid_Author IS NULL) ORDER BY Insertion_Time DESC");

					echo '<table class="tftable" id="buytable" border="1" >
					<tr><th>Insertion time</th><th>Item</th><th>Highest Bid</th><th>Put</th></tr>';

					while($row = mysqli_fetch_array($result)) {
  						echo "<tr>";
  						echo "<td>" . $row['Insertion_Time'] . "</td>";
  						echo "<td>" . $row['Name'] . "</td>";
  						echo "<td>" . sprintf("%.2f",$row['Highest_Bid']) . "</td>";
  						echo '<td><form id="myput" action="new_put.php" method="post">
  							<input type="hidden" name="item" value=' . $row['Good_ID'] . '>
                   			<input type="number" step=".01" placeholder="Your bid" style="font-size:1em; width:100px;" name="putvalue" required="true">
                   			<input id="myinput" type="submit" value="Submit">
                			</form></td>';
						echo "</tr>";
					}
					echo "</table>";
				?>
       </div>       
    </body>
</html>
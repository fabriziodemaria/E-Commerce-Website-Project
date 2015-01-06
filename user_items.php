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
                    <li style="background-color:white;"><a href="user_items.php">>Your items</a></li>
                    <li><a href="sell.php">Sell</a></li>
                    <li><a href="bid.php">Bid</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
            <div id="myContent">
            <?php
				include("connection.php");
				
				if(isset($_GET['inserted'])){
            			echo '<p class="confirm">Object inserted!</p>';
            		}
			
				$username = $_SESSION['user'];
				$result = mysqli_query($conn,"SELECT * FROM Goods WHERE Owner = '" . $username . "' ORDER BY Insertion_Time DESC");

				echo '<table class="tftable" border="1">
				<tr><th>Insertion time</th><th>Item</th><th>Highest Bid</th><th>Highest Bid Author</th></tr>';

				while($row = mysqli_fetch_array($result)) {
  					echo "<tr>";
  					echo "<td>" . $row['Insertion_Time'] . "</td>";
  					echo "<td>" . $row['Name'] . "</td>";
  					echo "<td>" . sprintf("%.2f",$row['Highest_Bid']) . "</td>";
  					echo "<td>" . $row['HBid_Author'] . "</td>";
					echo "</tr>";
				}

				echo "</table>";
			?>
		</div>
	</body>
</html>
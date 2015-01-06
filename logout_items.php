<?php
session_start();

include("cookiescheck.php");
include("global_checks.php");
if(isset($_SESSION['loggedin']))
{
	header("Location: bid.php");	
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
                    <li><a href="index.php">Login</a></li>
                    <li><a href="registration.php">Registration</a></li>
                </ul>
            </div>
            
            <div id="myContent">
            <p class="welcome">Current insertions on Auctions</p>
      
            <p class="instructions">Login or Register to interact</p>
            
			<?php
				include("connection.php");

				$result = mysqli_query($conn,"SELECT Name, Highest_Bid FROM Goods ORDER BY Insertion_Time DESC");

				echo '<table class="tftable" border="1">
				<tbody><tr><th width="300px">Item</th><th width="300px">Highest Bid</th></tr>';				

				while($row = mysqli_fetch_array($result)) {
  					echo "<tr>";
  					echo '<td width="300px">' . $row['Name'] . '</td>';
  					echo '<td width="300px">' . sprintf("%.2f",$row['Highest_Bid']) . '</td>';
  					echo "</tr>";
				}

				echo "</tbody></table>";
			?>
		</div>
		</div>
	</body>
</html>
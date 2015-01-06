	<?php
	session_start();
	include("global_checks.php");
	if(isset($_SESSION['loggedin']))
	{	
	} else {
		header("Location: index.php");
		exit;
	}
	
	include("connection.php");
	if (!$conn) {
	    // echo("<script type=\"text/javascript\"> 
					// alert(\"Database error: the database in temporary unreachable. Please try again later.\");  
					// window.location.href=\"index.php\";
					// </script>");
					header("Location: logout.php?dbunreachable");
					exit;
	} else {
		
	    if (!empty($_POST['itemname'])) {
	        $rItemName = trim($_POST['itemname']);
			
			if(!empty($_POST['itemprice'])){
				$rItemPrice = trim($_POST['itemprice']);
				$rPrice = mysqli_real_escape_string($conn, $rItemPrice);
					if($rPrice !== $rItemPrice) {
						mysqli_close($close);
						header("Location: sell.php?errorinvalid");
						exit;
				}
			} else {
					$rItemPrice = 0;
			}
			
			if(is_numeric($rItemPrice)==FALSE){
				mysqli_close($close);
				header("Location: sell.php?errorwrongnum");
				exit;
							
			} 
		
			if ($rItemPrice < 0 || $rItemPrice >= 1000000000){
				mysqli_close($close);
				header("Location: sell.php?errorwrongnum");
				exit;
			}
			
			//Trimming the number
			$rItemPrice = round($rItemPrice, 2);
			
			
			$rName = mysqli_real_escape_string($conn, $rItemName);
			
			//if ($rName === $rItemName) {
	 		if(true){
	                    $myquery = "SELECT * FROM Goods WHERE Name='" . $rName . "'";
	                    $result = mysqli_query($conn, $myquery);
						$row = mysqli_num_rows($result);
	                    
	                    if ($row === 0) {
	                    	$myquery = "INSERT INTO `Goods`(`Name`, `Owner`, `Highest_Bid`) VALUES ('" . $rName . "','" . $_SESSION['user'] . "','" . $rItemPrice . "' )";
	                        $result = mysqli_query($conn, $myquery);
									if($result==1){
	                      	        // echo '<script type="text/javascript"> 
									// alert("Correctly inserted.");
									// window.location.href="user_items.php";
									// </script>';
									mysqli_free_result($result);
									mysqli_close($close);
									header("Location: user_items.php?inserted");
									exit;
							} else {
	                            // echo '<script type="text/javascript"> 
							// alert("ERROR during the insertion procedure. Please try again");
							// window.location.href="sell.php";
							// </script>';
							mysqli_free_result($result);
							mysqli_close($close);
							header("Location: sell.php?error");
							exit;
	                        }
						} else {
	                        // echo '<script type="text/javascript"> 
						// alert("Item name already existing, please choose a new one");
						// window.location.href="sell.php";
						// </script>';
						mysqli_close($close);
						header("Location: sell.php?errorname");
						exit;
	                    }
	               } else {
	            // echo '<script type="text/javascript"> 
				// alert("ERROR: invalid text inserted. Try again");
				// window.location.href="sell.php";
				// </script>';
				mysqli_close($close);
				header("Location: sell.php?errorinvalid");
				exit;
	        }
	        
	    } else {
	        // echo '<script type="text/javascript"> 
			// alert("ERROR: input data missing");
			// window.location.href="sell.php";
			// </script>';
			mysqli_close($close);
			header("Location: sell.php?errornodata");
			exit;
	    }
	}
?>
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
				// alert(\"Database error: the database in temporary unreachable. Please try again later.\");                              ù
				// window.location.href=\"index.php\";
				// </script>");
				header("Location: index.php?dbunreachable");
				exit;
} else {
	
    if (!empty($_POST['putvalue']) && !empty($_POST['item'])) {
        $rPut = trim($_POST['putvalue']);
		$rGood = $_POST['item'];
		
		$rP = mysqli_real_escape_string($conn, $rPut);
		$rG = mysqli_real_escape_string($conn, $rGood);
		
		if(is_numeric($rPut)==FALSE){
			mysqli_close($conn);
			header("Location: bid.php?invalidtext");
			exit;		
		}
		
		//If here the number is valid and now i round
		$rPut = round($rPut,2);
		
		//if ($rP === $rPut && $rG === $rGood) {
 		if(true){
                    $myquery = "SELECT Highest_Bid FROM Goods WHERE Good_ID='" . $rG . "'";
                    $result = mysqli_query($conn, $myquery);
					$obj = $result->fetch_object();		
					$act = $obj->Highest_Bid;
							
                    if ($act < $rPut) {
                    	
						if($rPut > 1000000000){
							mysqli_free_result($result);
							mysqli_close($conn);
							header("Location: bid.php?maxbid");
							exit;
						}
						
						
						
						if ($rPut < 0 || $rPut >= 1000000000){
							mysqli_free_result($result);
							mysqli_close($conn);
							header("Location: bid.php?invalidtext");
							exit;
						}
                        $myquery = "UPDATE Goods SET Highest_Bid = '". $rPut ."', HBid_Author = '". $_SESSION['user'] ."' WHERE Good_ID = '". $rG ."'";
                        $result = mysqli_query($conn, $myquery);
                        if ($result == "TRUE") {
                            // echo '<script type="text/javascript"> 
						// alert("Correct bid.");
						// window.location.href="bid.php";
						// </script>';
						mysqli_free_result($result);
						mysqli_close($conn);
						header("Location: bid.php?correctbid");
						exit;
                        } else {
                            // echo '<script type="text/javascript"> 
						// alert("ERROR during the bid procedure. Please try again");
						// window.location.href="bid.php";
						// </script>';
						mysqli_free_result($result);
						mysqli_close($conn);
						header("Location: bid.php?error");
						exit;
                        }
                    } else {
                        // echo '<script type="text/javascript"> 
					// alert("You have to insert a number higher than the actual highest bid");
					// window.location.href="bid.php";
					// </script>';
					mysqli_free_result($result);
					mysqli_close($conn);
					header("Location: bid.php?errorbidlow");
					exit;
                    }
               } else {
            // echo '<script type="text/javascript"> 
			// alert("ERROR: invalid text entered. Try again");
			// window.location.href="bid.php";
			// </script>';
			mysqli_close($conn);
			header("Location: bid.php?invalidtext");
			exit;
        }
    } else {
        // echo '<script type="text/javascript"> 
		// alert("ERROR: input data missing");
		// window.location.href="bid.php";
		// </script>';
		mysqli_close($conn);
		header("Location: bid.php?errornoinput");
		exit;
    }
}


?>
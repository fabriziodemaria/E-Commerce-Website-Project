<?php
	session_start();
	
	include("global_checks.php");
	
	if(isset($_SESSION['loggedin']))
{
	// echo("<script type=\"text/javascript\"> 
				// alert(\"You were logged in already. Logging out.\");
				// window.location.href=\"logout.php\";
				// </script>");
				header("Location: user.php?logintry");
				exit;
} else {
	
	if(!isset($_POST['username']) || !isset($_POST['password'])){
		// echo("<script type=\"text/javascript\"> 
				// alert(\"Complete the login form properly\");
				// window.location.href=\"index.php\";
				// </script>");
				header("Location: logout.php?wrongform");
				exit;
	}
	include ("connection.php");
    if (!$conn) {
        // echo("<script type=\"text/javascript\"> 
				// // alert(\"Database error: the database in temporary unreachable. Please try again later.\");
				// // window.location.href=\"index.php\";
				// // </script>");
				header("Location: logout.php?dbunreachable");
				exit;
    } else {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        $myuser = mysqli_real_escape_string($conn, $username);
        $mypass = mysqli_real_escape_string($conn, $password);
  

        if (!isset($_SESSION['loggedin'])) {
        	$query = "SELECT * FROM Users WHERE Email = '" . $myuser . "' AND Password= '" . md5($mypass) . "'";
			$result = mysqli_query($conn, $query) or die (mysqli_error($conn));
            
            if (mysqli_num_rows($result) == 1) {
                $_SESSION['loggedin'] = 1;
				$_SESSION['user'] = $myuser;
				mysqli_free_result($result);
				mysqli_close($close);
                header("Location: user.php");
					exit;
            } else {
                // echo '<script type="text/javascript"> 
                      // alert("Invalid username or password. Please try again or sign in");
                     // window.location.href="index.php";
                     // </script>';
                     mysqli_free_result($result);
					 mysqli_close($close);
                     header("Location: index.php?invalidup");
                     exit;
            }
        } else if (isset($_SESSION['user']) && $_SESSION['user'] === $username) {
            // echo '<script type="text/javascript"> 
                           // alert("You are alredy logged");
                           // window.location.href="user.php";
                    	   // </script>';
                    	   mysqli_close($close);
						   header("Location: user.php?useralreadyin");
						   exit;
		} else {
            // echo '<script type="text/javascript"> 
                           // alert("You must logout before logging another account");
                           // window.location.href="user.php";
                    // </script>';
                    mysqli_close($close);
					header("Location: user.php?logintry");
					exit;
        }
    }
    }
   
 ?>
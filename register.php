<?php
session_start();

include("global_checks.php");
if(isset($_SESSION['loggedin']))
{
	// echo '<script type="text/javascript"> 
						// alert("First, you need to logout!");
						// window.location.href="logout.php";
						// </script>';	
						header("Location: user.php?needtologout");
						exit;
}
include("connection.php");
if (!$conn) {
    // echo("<script type=\"text/javascript\"> 
				// alert(\"Database error: the database in temporary unreachable. Please try again later.\");                              
				// window.location.href=\"index.php\";
				// </script>");
				header("Location: index.php?dbunreachable");
				exit;
} else {
	
    if (!empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['passwordc'])) {
        $rName = trim($_POST['name']);
        $rSurname = trim($_POST['surname']);
        $rEmail = trim($_POST['email']);
        $rPassword = trim($_POST['password']);
        $rPasswordC = trim($_POST['passwordc']);

		
		if(!preg_match('/^[A-Za-z][A-Za-z\' ]+$/',$rName)){
			mysqli_close($conn);
			header("Location: registration.php?nameno");
			exit;
		}
		
		if(!preg_match('/^[A-Za-z][A-Za-z\' ]+$/',$rSurname)){
			mysqli_close($conn);
			header("Location: registration.php?surnameno");
			exit;
		}
		
        $rN = mysqli_real_escape_string($conn, $rName);
        $rS = mysqli_real_escape_string($conn, $rSurname);
        $rE = mysqli_real_escape_string($conn, $rEmail);
        $rP = mysqli_real_escape_string($conn, $rPassword);
        $rC = mysqli_real_escape_string($conn, $rPasswordC);
		
		
        //if ($rN === $rName && $rS === $rSurname && $rE === $rEmail && $rP === $rPassword && $rC === $rPasswordC) {
 		if(true){
            if ($rP === $rC) {
            	
                if (filter_var($rE, FILTER_VALIDATE_EMAIL)) {
                	
                    //check if alredy exist a user with that credentials 
                    $myquery = "SELECT * FROM Users WHERE Email='" . $rE . "'";
                    $result = mysqli_query($conn, $myquery);
				
                    $row = mysqli_num_rows($result);
                    if ($row === 0) {//no users alredy registered with this email address
                    	$myquery = "INSERT INTO `Users`(`Name`, `Surname`, `Email`, `Password`) VALUES ('" . $rN . "','" . $rS . "','" . $rE . "','" . md5($rP) . "');";
                        $result = mysqli_query($conn, $myquery);
                        if ($result == "TRUE") {
                            // echo '<script type="text/javascript"> 
						// alert("Correctly registered. Please Login");
						// window.location.href="index.php";					
						// </script>';
						mysqli_free_result($result);
						mysqli_close($conn);
						header("Location: index.php?registered");
						exit;
                        } else {
                            // echo '<script type="text/javascript"> 
						// alert("ERROR during the registration procedure. Please try again");
						// window.location.href="registration.php";
						// </script>';
						mysqli_free_result($result);
						mysqli_close($conn);
						header("Location: registration.php?error");
						exit;
                        }
                    } else {
                        // echo '<script type="text/javascript"> 
					// alert("User already registered");
					// window.location.href="registration.php";
					// </script>';
					mysqli_free_result($result);
					mysqli_close($conn);
					header("Location: index.php?alreadyreg");
					exit;
                    }
                } else {
                    // echo '<script type="text/javascript"> 
				// alert("Email insert not valid");
				// window.location.href="registration.php";
				// </script>';
				mysqli_close($conn);
				header("Location: registration.php?emailno");
				exit;
                }
            } else {
                // echo '<script type="text/javascript"> 
			// alert("Password NOT matching");
			// window.location.href="registration.php";
			// </script>';
			mysqli_close($conn);
			header("Location: registration.php?passno");
			exit;
            }
        } else {
            // echo '<script type="text/javascript"> 
			// alert("ERROR: invalid words in insert values. Try again");
			// window.location.href="registration.php";
			// </script>';
			mysqli_close($conn);
			header("Location: registration.php?wordsno");
			exit;
        }
    } else {
        // echo '<script type="text/javascript"> 
		// alert("ERROR: input data missing");
		// window.location.href="registration.php";
		// </script>';
		mysqli_close($conn);
		header("Location: registration.php?datano");
		exit;
    }
}
?>


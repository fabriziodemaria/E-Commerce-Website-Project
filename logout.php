<?php
session_start();
include("global_checks.php");
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==1){
        $_SESSION['loggedin']=0;
		session_destroy();
    /*    echo("<script type=\"text/javascript\"> 
						alert(\"Logout successful\");
						window.location.href=\"index.php\";
						</script>");*/
						if(isset($_GET['dbunreachable'])){
							header("Location: index.php?dbunreachable");
							exit;
						}
						if(isset($_GET['alreadyloggedin'])){
							header("Location: index.php?alreadyloggedin");
							exit;
						}
						if(isset($_GET['logoutneeded'])){
							header("Location: index.php?logouttoregister");
							exit;
						}
						
						header("Location: index.php?logoutok");
						exit;
} else {
	/* echo("<script type=\"text/javascript\"> 
						alert(\"You were not logged in.\");
						window.location.href=\"index.php\";
						</script>");  */
					header("Location: index.php?nologgedalready");
					exit;
}
?>
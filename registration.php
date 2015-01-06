<?php
session_start();
include("cookiescheck.php");
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
?>

<!DOCTYPE htmlPUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Auctions - HomePage</title>
        <link rel="stylesheet" type="text/css" href="templates.css">
        <script type="text/javascript" src="Js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="Js/jquery.validate.js"></script>
        <script>
  

  $(function() {
  	 $.validator.setDefaults({ onkeyup: false });
  	 $.validator.setDefaults({ highlight: function(el, error, valid){ $(el).siblings('.errormsg').remove; } });
  	 
    
    $("#myRegistration").validate({
    
        // Specify the validation rules
        rules: {
          
            email: {
                email: true
            },
            passwordc: {
                equalTo: "#pwd_1" 
            }
        },
        
        // Specify the validation error messages
        messages: {
            name: "Name required",
            surname: "Surname required",
            email: "Insert valid email",
            password: {
                required: "Insert password"
                //minlength: "Your password must be at least 5 characters long",
                 
            },
            passwordc: {
            	equalTo: "Not matching!"
            }
        }
        
        
    });
  });
</script>
   </head>

    <body>
          <?php include("title.php"); ?>
        <div id="container">
           <div id="navigationBar">
                <ul id="myMenu">
                	 <li>Welcome Guest!</li>
                	 <li></li>
                    <li><a href="index.php">Login</a></li>
                    <li style="background-color:white;"><a href="registration.php">>Registration</a></li>
                </ul>
            </div>
            <?php
            		if(isset($_GET['error'])){
            			echo '<p class="error">Something wrong happened... Retry</p>';
						
            		}
            		if(isset($_GET['emailno'])){
            			echo '<p class="error">Wrong email address</p>';
					
            		}
            		if(isset($_GET['passno'])){
            			echo '<p class="error">Passwords NOT matching!</p>';
					
            		}
            		if(isset($_GET['wordsno'])){
            			echo '<p class="error">Invalid input</p>';
					
            		}
					if(isset($_GET['datano'])){
            			echo '<p class="error">Missing input</p>';
					
            		}
					if(isset($_GET['nameno'])){
            			echo '<p class="error">Invalid Name</p>';
					
            		}
					if(isset($_GET['surnameno'])){
            			echo '<p class="error">Invalid Surname</p>';
					
            		}
            	?>
            <div id="myContent">
                <form id="myRegistration" action="register.php" method="post">
                   <label for="username">Name</label><input class="regbox" id="nameinput" type="text" placeholder="Insert your name" style="font-size:1em;" name="name" required="required">
                   <br>
                   <label for="surname">Surname</label><input  class="regbox"  type="text" placeholder="Insert your surname" style="font-size:1em;" name="surname" required="required">
                   <br>
                   <label for="email">Email</label><input  class="regbox" type="email" style="font-size:1em;" placeholder="Insert your email" name="email" required="required">
                   <br>
                   <label for="password">Password</label><input class="regbox"  type="password" style="font-size:1em;" placeholder="Choose a password" name="password" required="required" id="pwd_1">
                   <br>
                   <label for="confPwd">Retype Password</label><input  class="regbox" type="password" style="font-size:1em;" placeholder="Confirm the password" name="passwordc" id="passwordc" required="required">
                   <br>
                   <input id="myinput" type="submit" value="Submit">
                </form>
            </div>
      
    </body>   
</head>
</html>

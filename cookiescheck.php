<?php
    setcookie('prv',1,time()+3600);
  		if(!isset($_COOKIE['prv'])){
			header("Location: checkcookie.php?back=" . $_SERVER['REQUEST_URI']);
			exit;
		}
	setcookie('prv',1,time()-3600);
?>
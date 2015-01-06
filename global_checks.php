<?php

if (!isset($_SERVER['HTTPS']))
    header('Location: https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);

$timeoutmax = 60 * 2;
if (isset($_SESSION['timeout'])) {

    $time_actual = time();
    $passed = $time_actual - (int) $_SESSION['timeout'];
    if ($passed > $timeoutmax) {
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == 1) {
            $_SESSION['loggedin'] = 0;
            session_destroy();
            // echo("<script type=\"text/javascript\"> 
				// alert(\"Connection expired.\");
				// window.location.href=\"index.php\";
				// </script>");
				header('Location: index.php?connexpired');
            exit;
        }
    }
}
$_SESSION['timeout'] = time();
?>
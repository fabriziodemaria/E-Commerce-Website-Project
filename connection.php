<?php
include("global_checks.php");
$conn = mysqli_connect('localhost', 's207063','terrousl');
if (!$conn) {
    die('Not connected : ' . mysql_error());
}

$db_selected = mysqli_select_db($conn, 's207063');
if (!$db_selected) {
    die ('Can\'t use Auctions db : ' . mysql_error());
}
?>
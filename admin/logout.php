<?php include("functions/init.php"); 
$email = $_SESSION['email'];
$sql3 = "UPDATE usr_details SET u_status = '0' WHERE u_email = '$email'";
$result3 = query($sql3);
confirm($result3);
session_destroy();

redirect("login.php");

?>
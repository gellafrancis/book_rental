<?php 

ob_start(); //output buffering use for redirection
session_start();

include("functions.php");
include("db.php");
date_default_timezone_set('Asia/Manila');


//test if there's a connection
if ($con){
  //echo "You are connected";
}else{
  echo "You are not connected";
}

?>
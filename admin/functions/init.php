<?php 

ob_start(); //output buffering use for redirection
session_start();

include("functions.php");
include("db.php");


//test if there's a connection
if ($con){
  //echo "You are connected";
}else{
  echo "You are not connected";
}

?>
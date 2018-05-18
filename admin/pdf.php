<?php
require('pdf/pdf/fdpf/fpdf.php');
 include("functions/init.php");


 $sql = "SELECT * FROM log_history";
 $result = query($sql);

           

 
$mypdf = new FPDF();
$mypdf -> AddPage();

$mypdf -> SetTitle("Edit History Report", false);

$mypdf -> SetFont("Arial", "B", 12);
$mypdf -> SetTextColor(0, 0, 0);
$mypdf -> SetDrawColor(255, 140, 0);

// cell
     

$mypdf -> Cell(95, 10, "Date and Time", 1, 0, "C");
$mypdf -> Cell(95, 10, "Activity", 1, 1, "C");
while($row = mysqli_fetch_array($result))
{

$mypdf -> Cell(95, 10, $row['log_date'] , 1, 0, "C");
$mypdf -> Cell(95, 10, $row['log_activity'], 1, 1, "C");
}
//$mypdf -> Image("img.png", 0, 0, 50, 20);

$mypdf -> Output();
?>
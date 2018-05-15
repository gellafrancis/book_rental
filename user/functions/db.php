<?php 
//Connection
$con = mysqli_connect('localhost', 'root', '', 'bookrental');
// *Not fix pa to hindi ko mapalitan yung root ng mismong db ko at may password

function row_count($result){ 
  return mysqli_num_rows($result);
}

function escape($string){ //avoid sql injection
    global $con; // bakit pag sinasama ko to nag pupunti lang isang entry ko sa database
    return mysqli_real_escape_string($con, $string); //may return dapat 
}


function query($query){ //query yung data
    global $con;  
    return mysqli_query($con, $query); 
}

function fetch_array($result){ // kinukuha yung data
    global $con;
    return mysqli_fetch_array($result);
}

function confirm($result){
    global $con; // if mag false pupunta sa quiry failed
    if(!$result){
      die("QUERY FAILED" . mysqli_error($con));
    }
}



?>
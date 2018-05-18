<!DOCTYPE html>
<?php include("functions/init.php");?>

<?php


if(isset($_GET['value'])&&$_GET['value']){
// values
  $var = $_GET['value']; //some_value	
  $query="Select * from book_details where B_ID='$var'";
  $result=mysqli_query($con,$query);
  
  while($res=mysqli_fetch_array($result)){
      $id = $res['B_ID'];
	  $title=$res['B_TITLE'];
	  $isbn=$res['B_ISBN'];
	  $author=$res['B_AUTHOR'];
	  $publisher=$res['B_PUBLISHER'];
	  $published=$res['B_PUBLISHED'];
	  $desc=$res['B_DESC'];
	  $stock=$res['B_QTY'];
	  $img=$res['B_IMG'];
	  $price=$res['B_PRICE'];
      $other=$res['B_OTHER'];
}

$sql = "SELECT * FROM book_details WHERE b_id=" . escape($var) ;
$query = query($sql);
confirm($query);

while($res = fetch_array($query)){
	if($stock != $_SESSION['b_id' . $var]){
		$_SESSION['b_id' . $var] +=1;
	}else{
		set_message("We only have " . $stock . " Available " . $title);
	}

}
}
if(isset($_GET['remove'])){
    $_SESSION['b_id' . $_GET['remove']]--;
    if ( $_SESSION['b_id' . $_GET['remove']] < 1){
        redirect("cart.php");
     }
         
}
    
     if(isset($_GET['delete'])){
     $_SESSION['b_id' . $_GET['delete']] = '0';
        redirect("cart.php");
     
    }


function cart(){
    $sql = "SELECT * FROM book_details";
    $query = query($sql);
    confirm($query);

    while($res = fetch_array($query)){
        $id = $res['B_ID'];
        $title=$res['B_TITLE'];
        $isbn=$res['B_ISBN'];
        $author=$res['B_AUTHOR'];
        $publisher=$res['B_PUBLISHER'];
        $published=$res['B_PUBLISHED'];
        $desc=$res['B_DESC'];
        $stock=$res['B_QTY'];
        $img=$res['B_IMG'];
        $price=$res['B_PRICE'];
        $other=$res['B_OTHER'];
        
        if (!isset($_SESSION['b_id' . $id])){
            $_SESSION['b_id' . $id] = 0;
          }
        if(isset($_SESSION['b_id' . $id])){
            $qty_in_session =  $_SESSION['b_id' . $id] ;
        }else{
            $qty_in_session = '0';
        }


$book = <<< HEREDOC

<tr>
<td><img src="../admin/{$img}" width="70"></td>
<td>
    <a href="Book.php">{$title}</a> <br>
    Author: {$author} <br>
</td>
<td>{$price}</td>
<td> {$qty_in_session}  </td>
<td>
<a href="cart.php?value={$id}">Add</a>
<a href="cart.php?remove={$id}">Remove</a>
<a href="cart.php?delete={$id}">Delete</a>
</button></td>



</tr>

HEREDOC;

echo $book;



    }

}
 
             
    

        


	
?>


<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/book2.png" type="image/png">
    <title>Book Information</title>   
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <script src="https://use.fontawesome.com/c560c025cf.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.bootstrap.min.css">
            
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.1/js/responsive.bootstrap.min.js"></script>   

<style>

    .panel.panel--styled {
        background: #F4F2F3;
    }
    .panelTop {
        padding: 30px;
    }

    .panelBottom {
        border-top: 1px solid #e7e7e7;
        padding-top: 20px;
    }
    .btn-add-to-cart {
        background: rgb(255,131,41);
        color: #fff;
    }
    .btn.btn-add-to-cart.focus, .btn.btn-add-to-cart:focus, .btn.btn-add-to-cart:hover  {
            color: #fff;   
        background: green;
            outline: none;
    }
    .btn-add-to-cart:active {
            background: rgb(255,131,41);
            outline: none;
    }


    span.itemPrice {
        font-size: 24px;
        color: rgb(255,131,41);
    }

    #body {
      margin: 0;
      padding-top: 330px;
      background-color:grey;
    }
    #header{
      padding-top:100px;
      height:330px;
      width:100%;
      background: url('assets/img/books-header.jpg') center;
      background-size: cover;
      background-color:#009999;
      color:#fff;
      text-shadow: 2px 2px 2px rgba(0,0,0,0.5);
    }
    #header{
      position: fixed;
      width: 100%;
      top: 0;
    }
    .navbar,
    #main {
      position: relative;
      
    }
    .navbar.navbar-default {
      z-index: 150;
      margin-bottom: -50px;
      box-shadow: 0 2px 3px rgba(0,0,0,.4);
      color:#fff;
    }
    #main {
        background-color: #F8F8F8;      
        padding:100px 0 50px 0;
    }

    .link:hover{
        color:grey;
    }
    
    #imaginary_container{
    margin-top:5%; 
    margin-bottom:5%; 
    }
    .stylish-input-group .input-group-addon{
        background: white !important; 
    }
    .stylish-input-group .form-control{
        border-right:0; 
            box-shadow:0 0 0; 
            border-color:#ccc;
    }
    .stylish-input-group button{
        border:0;
        background:transparent;
    }
    hr{
        border: 1px solid #d3d3d3;
       
    }
    
    .link{
        color: black;      
    }
    .link{
        color: black;      
    }
    .thead-dark{
        background-color: #282828;
        color: white;
    }
    
    .bonus-products{
    border:1px solid #ccc;
    border-top:none;
    padding:18px;
    background:rgba(0,0,0,.05);
    strong{
      font-weight:400;
      color:#888;
      font-size:.8em;
      .bp-toggle{
        font-size:.7em;
        cursor:default;
      }
    } 
  }

</style>
<script>
           $(document).ready(function() {
              $('#myTable').DataTable();
            } );
            $('#myTable').dataTable( {
                responsive: true
            } );
    
    var  mn = $(".navbar.navbar-default");
    var  mns = "navbar-fixed-top";
    var  hdr = $('#header').height(); 

    $(window).scroll(function() {
      if( $(this).scrollTop() > (hdr+80) ) {
        mn.addClass(mns);
      } else {
        mn.removeClass(mns);
      }
    });
    </script>
</head>

<body>
    
<div class="text-center" id="header">
    <h1><img src='assets/img/book.png' width='70'></h1>
  <h2>Rent. Read. Return. </h2>
</div>

<div id="body">
  <nav class="navbar navbar-default navbar-static-top" style="background-color: rgb(255,131,41);">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#" class="link" style="color:white">BookRentals</a>
      </div>
      <ul class="nav navbar-nav navbar-right" id="bs-example-navbar-collapse-1">
        <li><a href="index.php" style="color:white">Home</a></li>
        <li><a href="Rent.php" style="color:white">Rent</a></li>
        <li><a href="#" style="color:white">Return</a></li>
        <li><a href="userprofile.php" style="color:white"><span class="glyphicon glyphicon-user"></span></a></li>
        <li><a href="Cart.php" style="color:white"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
        <li><a href="logout.php" style="color:white">Logout</a></li>
      </ul>
    </div>
  </nav>

  <div id="main">

    <div class="container">   

      <div class="row">  
	    <div class="items">
                        <h1><i class="fa fa-shopping-cart"></i> Shopping Cart</h1>
                        <h5><a href="Rent.php" style="color:grey">Home</a> <b>></b> <a href="#" style="color:orange">Shopping Cart</a> </h5> 
                      <?php  display_message();
                       

                            
                          
                        
                       
                      
                      ?>                             

        <hr>
  <div class="bonus-products">
    <strong>Items in your cart</strong>
    
  </div>
        <div class="items">
            <div class="panel panel-default">
                <div class="table-responsive">
                    <table class="table display responsive no-wrap" cellspacing="0" width="100%"  style="" class="display">
                        <thead class="thead-dark ">
                            <tr>
                                <th><b>Book</b></th>
                                <th><b>Description</b></th>
                                <th><b>Price</b></th>
                                <th><b>Quantity</b></th>
                                <th><Action/th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php cart(); ?>
                            
                        </tbody>
                    </table>
                    
                </div>
           </div>
            <hr>
             <div style="float:left"> 
                 <a>Continue shopping</a>
             </div>
            <div style="float:right"> 
                <table width="200">
                   
                    <tr>
                        <td>
                            <font size="2px" style="padding-right: 5%;color:grey"> SUBTOTAL: </font>
                        </td>
                        <td>
                            <font size="3px" style="color:orange;">₱200.00</font>
                        </td>                        
                    </tr>
                    <tr>
                         <td>
                            <font size="2px" style="padding-right: 5%;color:grey"> SHIPPING: </font> 
                        </td>
                        <td>
                            <font size="3px" style="color:orange;">₱80.00</font>
                        </td>                        
                    </tr>
                    <hr>     
                </table>
                  <table width="200">
                   
                    <tr>
                        <td>
                            <font size="5px" style="padding-right: 5%;color:grey"><b> TOTAL: </b></font>
                        </td>
                        <td>
                            <font size="5px" style="color:orange;"> <b> ₱280.00 </b></font>
                        </td>                        
                    </tr>
                    <hr>     
                </table>
                <br>
                <button class="btn btn-success btn-lg" style="float: right;margin-right: 40px;">CHECKOUT</button>               
            </div>
        </div>
      </div>
    </div>
</div>
  </div>
</body>
</html>
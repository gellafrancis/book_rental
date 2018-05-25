<!DOCTYPE html>
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
<?php if(!logged_in()){ redirect("login.php"); }?>
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
        <li><a href="checkout.php" style="color:white">Return</a></li>
        <li><a href="UserProfile.php" style="color:white"><span class="glyphicon glyphicon-user"></span></a></li>
        <li><a href="Cart.php" style="color:white"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
        <li><a href="Logout.php" style="color:white">Logout</a></li>
      </ul>
    </div>
  </nav>

  <div id="main">

    <div class="container">   

      <div class="row">  
	    <div class="items">
                        <h1>Checkout</h1>                                                   

        <hr>
  <div class="bonus-products">
    <strong>Items you have checked out.</strong>
    
  </div>
        <div class="items">
            <div class="panel panel-default">
                <div class="table-responsive">
                    <table class="table display responsive no-wrap" cellspacing="0" width="100%"  style="" class="display">
                        <thead class="thead-dark ">
                            <tr>
                                <th><b>Book</b></th>
                                <th><b>Description</b></th>
                                <th><b>Date Started</b></th>
                                <th><b>Date End</b></th>
                                <th><b>Action</b></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="assets/img/BookCover/Call Me By Your Name.jpg" width="70"></td>
                                <td>
                                    <a href="Book.php">Call Me By Your Name</a> <br>
                                    Author: Andre Aciman <br>
                                </td>
                                <td>Jan-01-2018</td>
                                <td>Jan-01-2018</td>  
                                 <td><button type="button" class="btn btn-warning btn-xs">
                                    Return
                                </button></td> 
                               
                                
                                
                            </tr>
                            <tr>
                                <td><img src="assets/img/BookCover/The Ones Who Walk Away from Omelas.jpg" width="70"></td>
                                <td>
                                    <a href="#">The Ones Who Walk Away from Omelas</a> <br>
                                    Author: Ursula K. Le Guin<br>
                                </td>
                                <td>Jan-01-2018</td>
                                <td>Jan-01-2018</td>  
                                 <td><button type="button" class="btn btn-warning btn-xs">
                                    Return
                                </button></td>                               
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
           </div>
            <hr>
             <div style="float:left"> 
                 <a href="rent.php">Continue shopping</a>
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
            </div>
        </div>
      </div>
    </div>
</div>
  </div>
</body>
</html>
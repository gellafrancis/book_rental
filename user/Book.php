	<!DOCTYPE html>
	
	<?php include("functions/init.php");?>
	<?php


	if(isset($_GET['value']) &&$_GET['value']){
  $var = $_GET['value']; //some_value	
  if(is_numeric($var)){
  $query="Select * from book_details where B_ID='$var'";
  $result=mysqli_query($con,$query);

  if (!isset($_SESSION['b_id' . $var])){
    $_SESSION['b_id' . $var] = 0;
  }
  
  while($res=mysqli_fetch_array($result)){
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
}else{
		header('location:Rent.php');
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
    .btn.btn-add-to-cart.focus, 
    .btn.btn-add-to-cart:focus, 
    .btn.btn-add-to-cart:hover  {
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
      background-color:#fff;
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
      background-color: #fff;
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
    .bonus-products{
    border:1px solid #ccc;
    border-top:none;
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

<body >
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
        <li><a href="userprofile.php" style="color:white"><span class="glyphicon glyphicon-user"></span></a></li>
<li><a href="cart.php" style="color:white"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
        <li><a href="logout.php" style="color:white">Logout</a></li>
      </ul>
    </div>
  </nav>

  <div id="main">
         <div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div id="imaginary_container"> 
                
            </div>
        </div>
	</div>
</div>
      
    <div class="container"> 
        <h4><a href="Rent.php" style="color:grey">Home</a> <b>></b> <a href="#" style="color:orange">Book Information</a> </h4>
      <div class="row">  
		<div class="row">
			<div class="col-md-12">				
				<div class="panel panel-default  panel--styled">
					<div class="panel-body">
						<div class="col-md-12 panelTop">	
							<div class="col-md-4">	
								<img class="img-responsive" src="<?php echo "../admin/". $img;?>" alt="" width="350"/>
							</div>
							<div class="col-md-8" style="text-align: left;">	
								<h2><?php echo $title?></h2>
                                                                <span class="glyphicon glyphicon-star" style="color:gold"></span>
                                                                <span class="glyphicon glyphicon-star" style="color:gold"></span>
                                                                <span class="glyphicon glyphicon-star" style="color:gold"></span>
                                                                <span class="glyphicon glyphicon-star" style="color:gold"></span><br> <br>
                                                                    ISBN: <?php echo $isbn; ?> <br>
                                                                    AUTHOR: <?php echo $author;?><br>
                                                                    PUBLISHER: <?php echo $publisher?><br>

                                                                    Additional Details 
                                                                                                                                     
                                                            <p style="color:rgb(75,75,75); padding-top: 8%">
                                                                <?php echo $desc; ?>
                                                            </p>
                                                            <br>
                                                            <h4>Stock: <input type="text" name="stock" value="<?php echo $stock?>" disabled="disabled" class="form-control" style="width: 200px;"/> </h4>
                                            <form method="GET" action="Cart.php"> 
                                                             <h5>Quantity: <select name="quan" class="form-control" style="width:200px">
                                                                    
																	<?php for($i=1;$i<=$stock;$i++){
																		if($i<=10){
																		echo "<option value='".$i."'>".$i."</option>";}
																		else if($stock==0){
																		echo "<option disabled>0</option>";	
																			
																		}
																		else{
																		break;	
																		}
                                                                    }?>
                                                                </select></h5>
<!-- //asda -->
                                                        <h5><b>Price:</b> <span class="itemPrice">₱ <?php echo $price;?></span></h5>

                                                    <input type="hidden" name="value" value="<?php echo $var; ?>">
							</div>
                          

						</div>
						
                                            <div class="" style="float:right">
                                                    <div>
                                                   
								<button class="btn btn-lg btn-add-to-cart" <?php if($stock==0){echo "disabled";}?><span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart</button>	
                                                                <button class="btn btn-lg btn-add-to-cart" <?php if($stock==0){echo "disabled";}?>><span class="glyphicon glyphicon-credit-card"></span>   Rent</button>
                                                   </div>
                                                </div> 
                                                </form>
				</div>
			</div>
		</div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Delivery Information</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Number of Days</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>Shipping Fee (regular rate)</td>
                                <td>₱ 100<br></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
                    <div class="grey">                
                <h2>  Other Descriptions: </h2>
    <?php echo $other;?>
	</div>
    </div>

    </div>
  </div> 
      <br>
 <img src="assets/img/flat1.png" width="100%">
</div>
</body>

</html>
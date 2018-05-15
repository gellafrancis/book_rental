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
        <li><a href="#" style="color:white"><span class="glyphicon glyphicon-user"></span></a></li>
<li><a href="#" style="color:white"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
        <li><a href="#" style="color:white">Logout</a></li>
      </ul>
    </div>
  </nav>

  <div id="main">
         <div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div id="imaginary_container"> 
                <div class="input-group stylish-input-group input-append">
                    <input type="text" class="form-control"  placeholder="Search books by ISBN, Author, Title ..." >
                    <span class="input-group-addon">
                        <button type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>  
                    </span>
                </div>
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
								<img class="img-responsive" src="assets/img/BookCover/Noli Me Tangere.jpg" alt="" width="350"/>
							</div>
							<div class="col-md-8" style="text-align: left;">	
								<h2>Noli Me Tangere</h2>
                                                                <span class="glyphicon glyphicon-star" style="color:gold"></span>
                                                                <span class="glyphicon glyphicon-star" style="color:gold"></span>
                                                                <span class="glyphicon glyphicon-star" style="color:gold"></span>
                                                                <span class="glyphicon glyphicon-star" style="color:gold"></span><br> <br>
                                                                    ISBN: 98765345678 <br>
                                                                    AUTHOR: Dr. Jose Rizal <br>
                                                                    PUBLISHER: C&E Publishing Inc. <br>

                                                                    Additional Details <br>
                                                                    PUBLICATION DATE: 1/7/2011 <br>
                                                                    PAGES: 544 
                                                                    <br>                                                                 
                                                            <p style="color:rgb(75,75,75); padding-top: 8%">
                                                                Noli Me Tángere (Latin for Don’t Touch Me ) is a novel written by 
                                                                José Rizal, one of the national heroes of the Philippines, during 
                                                                the colonization of the country by Spain to describe perceived
                                                                inequities of the Spanish Catholic priests and the ruling government.
                                                            </p>
                                                            <br>
                                                            <h4>Stock: <input type="text" name="stock" value="5" disabled="disabled" class="form-control" style="width: 200px;"/> </h4>
                                                             <h5>Quantity: <select name="quan" class="form-control" style="width:200px">
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                    <option>6</option>
                                                                    <option>7</option>
                                                                    <option>8</option>
                                                                    <option>9</option>
                                                                    <option>10</option>
                                                                </select></h5>
                                                        <h5><b>Price:</b> <span class="itemPrice">₱100.00</span></h5>
							</div>
                                                    

						</div>
						
                                            <div class="" style="float:right">
                                                    <div>
								<button class="btn btn-lg btn-add-to-cart"><a href="Cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>   Add to Cart </a></button>	
                                                                <button class="btn btn-lg btn-add-to-cart"><span class="glyphicon glyphicon-credit-card"></span>   Rent</button>
                                                   </div>
                                                </div> 
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
    In more than a century since its appearance, José Rizal's Noli Me Tangere has become widely known as the great novel of the Philippines. 
    A passionate love story set against the ugly political backdrop of repression, torture, and murder, "The Noli," as it is called in the Philippines, was the first major artistic manifestation
    of Asian resistance to European colonialism, and Rizal became a guiding conscience—and martyr—for the revolution that would subsequently rise up in the Spanish province.
           </div>
    </div>

    </div>
  </div> 
      <br>
 <img src="assets/img/flat1.png" width="100%">
</div>
</body>

</html>
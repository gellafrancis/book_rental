<?php include("functions/init.php");?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/book2.png" type="image/png">
    <title>Book Rent</title>   
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="assets/js/carousel.js"></script>
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" rel="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css">
    <link rel="stylesheet" rel="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.bootstrap.min.css">
            
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.1/js/responsive.bootstrap.min.js"></script>



<style>
@import 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css';
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
      padding:50px 0 50px 0;
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
            body {
    background-color: #EAEAEA;
    font-family: 'Roboto', sans-serif;
    }
    .wrap {
        max-width: 940px;
        margin: 0 auto ;
    }

    .menu {
        vertical-align: top;
        display: inline-block;
        margin: 10px ;
    }
    .menu-item {
        background-color: #FEFEFE;
        width: 200px;
        height: 150px;
        margin: 10px;
        border-radius: 3px;
        box-shadow:0 0 8px rgba(0, 0, 0, 0.06);
    }

    .header-item {
        letter-spacing: 2px;
        text-transform: uppercase;
        color: #3C3D41  ;
        font-size: 11px;
        padding: 15px 15px;
        border-bottom: 1.5px solid #EAEAEA;
    }

    .color-row1,  .color-row2  {
        margin: 15px;
        padding:0;
        max-width: 220px;
    }



    .items  {
        width: 650px;
        margin: 5px;
        display: inline-block;
    }
     .item {
        vertical-align: top;
        width: 190px; 
        height: 240px; 
        margin: 8px;
        background:#FEFEFE; 
        display: inline-block;
        border-radius: 3px;
        box-shadow:0 0 8px rgba(0, 0, 0, 0.06);
     }

    .mini-menu{
        width: 200px;
        border-radius: 3px;
        box-shadow:0 0 8px rgba(0, 0, 0, 0.06);
        overflow: hidden;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: #848C8F ;
        font-size: 11px;
        margin: 10px;
    }
    .mini-menu ul {
        list-style: none;
        margin: 0;
        padding:0;
        text-align:left;
    }
    .mini-menu > ul > li {
        position: relative;
    }
    .mini-menu > ul > li > a {
        display: block;	
        outline: 0;	
        padding: 1.2em 1em;	
        text-decoration: none;	
        color:#3C3D41;	
        font-weight: normal;
        letter-spacing: 2px;	
        background: #FEFEFE;
        border-bottom: 1.5px solid #EAEAEA;

    }

    .mini-menu .sub > ul {
        height: 0;
        overflow: hidden;
        background: #848C8F;
    }
    .mini-menu .sub > ul > li > a {
        font-family:  sans-serif;
        color:#FEFEFE;
        font-size: 12px;
        display: block;
        text-decoration: none;
        padding: .7em 1em;
        text-transform: capitalize;
        font-style: normal; 
        letter-spacing: 1px;
    }

    .mini-menu .sub > a.active,
     {
        padding-left: 1.3em;
        color: blue;
        content: "1";
        float: right;
        margin-right:6px;
        line-height: 12px;
    }
    .mini-menu .sub >  a:after{
        content: "»";
        float: right;
        margin-right:6px;
        line-height: 12px;
    }

    @media screen and (max-width: 940px) {
        .items {width: 420px;}
        .wrap {width: 700px;}
        .loadmore{width: 420px;}
       }
       @media screen and (max-width: 720px) {
        .items {width: 220px;}
        .wrap {width: 500px;}
        .loadmore{width: 220px;}
       }


       .ui-slider .ui-slider-handle {
        position: absolute;
        z-index: 2;
        width: 1em;
        height: 1.2em;
        cursor: default;
        outline: none;
        border: 1px solid rgb(207, 207, 207);
        background: #090;
        border-image: initial;
        border-radius: 50px 50px 50px 50px;
    }
    
    .newwarp{
        padding-left: 15%;
    }

    .grey{
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
#content {
    width: 900px;
    margin: 0 auto;
    text-align: center;
}

p.description {
    text-align: left;
}

    .ocarousel_window_slides div {
        text-align: center;
        height: 164px;
        margin-right: 4px;
        padding: 8px;
        font-size: 10px;
    }

    .example_programmatic_slide {
        width: 100px;
        border: 2px #ffffff solid;
    }

    .example_programmatic_controls {
        width: 260px;
        height: 60px;
        float: left;
    }

.ocarousel {
    display: none;
}
    .ocarousel_window {
        overflow: hidden;
        white-space: nowrap;
        width: 100%;
        height: 200px;
    }
        .ocarousel_window_slides {
            position: relative;
            margin: 0 auto;
            overflow: hidden;
            width: 50000px;
            white-space: nowrap;
        }
        .ocarousel_window_slides * {
            float: left;
            white-space: normal;
        }
        .ocarousel_window_slides * * {
            float: none;
        }
        .ocarousel_window_slides_vertical {
            float: none;
            white-space: normal;
            display: block;
        }
.ocarousel_indicators {
    width: 100%;
}
.ocarousel_indicators svg {
    height: 50px;
    margin: 0 auto;
    width: 100%;
}
.ocarousel_indicators svg circle {
    cursor: pointer;
}

/* Fallback indicators for no SVG support */
.ocarousel_indicator {
    display: inline-block;
    height: 16px;
    width: 16px;
    margin: 0 1px;
    overflow: hidden;
    cursor: pointer;

    /* IE 8< inline-block fix */
    *display: inline;
    zoom: 1;
}
.ocarousel_indicator_active {
    background: url('../images/indicatorsSVGFallback.gif') 0 0;
}
.ocarousel_indicator_inactive {
    background: url('../images/indicatorsSVGFallback.gif') -16px 0;
}




</style>
<script>
    
           $(document).ready(function() {
              $('#myTable').DataTable();
            } );
            $('#myTable').dataTable( {
                responsive: true
            } );

            $(document).ready(function () {
        $(".sub > a").click(function() {
            var ul = $(this).next(),
                    clone = ul.clone().css({"height":"auto"}).appendTo(".mini-menu"),
                    height = ul.css("height") === "0px" ? ul[0].scrollHeight + "px" : "0px";
            clone.remove();
            ul.animate({"height":height});
            return false;
        });
           $('.mini-menu > ul > li > a').click(function(){
           $('.sub a').removeClass('active');
           $(this).addClass('active');
        }),
           $('.sub ul li a').click(function(){
           $('.sub ul li a').removeClass('active');
           $(this).addClass('active');
        });
    });
        $( function() {
        $( "#slider-range" ).slider({
          range: true,
          min: 0,
          max: 1000,
          values: [ 190, 728 ],
          slide: function( event, ui ) {
            $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
             var mi = ui.values[0];
                  var mx = ui.values[1];
                  filterSystem(mi, mx);
          }
        });
        $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
          " - $" + $( "#slider-range" ).slider( "values", 1 ) );
      } );

        function filterSystem(minPrice, maxPrice) {
            $(".items div.item").hide().filter(function () {
                var price = parseInt($(this).data("price"), 10);
                return price >= minPrice && price <= maxPrice;
            }).show();
        }

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
        <li><a href="#bottom" style="color:white;text-decoration: underline">Rent</a></li>
        <li><a href="#" style="color:white">Return</a></li>
        <li><a href="#" style="color:white"><span class="glyphicon glyphicon-user"></span></a></li>
        <li><a href="#" style="color:white"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
        <li><a href="#" style="color:white">Logout</a></li>
      </ul>
    </div>
  </nav>

  <div id="main">
    <div>
        <img src="assets/img/bookflat1.png" width="100%">
    </div>
    <div class="grey">    
  </div>
   <br>
   
<div class="newwarp">
    
    <div class="menu">
        
        <div class="mini-menu">
            <ul>
        <li class="sub">
            <a href="#" style="color:#FF8329"><i class="fa fa-book" style="color:#FF8329"></i> GENRES</a>
            <ul>
               <li><a href="#">Comedy</a></li>
               <li><a href="#">Drama</a></li>
               <li><a href="#">Fiction</a></li>
               <li><a href="#">Graphic Novel</a></li>
               <li><a href="#">Health</a></li>
               <li><a href="#">History</a></li> 
               <li><a href="#">Horror</a></li>
               <li><a href="#">Mystery</a></li>
               <li><a href="#">Non-Fiction</a></li>
               <li><a href="#">Prayer Books</a></li>
               <li><a href="#">Religion, Spirituality & New Age</a></li>
               <li><a href="#">Romance Novel</a></li>
               <li><a href="#">Science Fiction</a></li>
            </ul>
        </li>
        <li class="sub">
            <a href="#" style="color:#FF8329"><i class="fa fa-trophy" style="color:#FF8329"></i> TOP BOOKS</a>
            <ul>
			
			
			<?php $query="select * from book_details order by RENT_COUNT desc limit 5";
			$result1=@mysqli_query($con,$query);
			
			
			while($res1=mysqli_fetch_array($result1)){
				
				echo "<li><a href='Book.php?value=".$res1['B_ID']."'>".$res1['B_TITLE']."</a></li>";	
			}
			
			
			
			?>
               
               
            </ul>
        </li>
    </ul>
        </div>
            
    </div>

    <div class="items">
        <div class="items"><form method="POST">
                <div class="table-responsive">
                    <h1><b>Books</b></h1>
                        
                    <table class="table display responsive no-wrap table-hover" cellspacing="0" width="100%" id="myTable" style="" class="display">
                        <thead>
                            <tr>
                                <th><b>Book</b></th>
                                <th><b>Description</b></th>
                            </tr>
                        </thead>
                        <tbody>
                
							
							<?php 
							$query="select * from book_details";
							$result=@mysqli_query($con,$query);
							
							while($res=mysqli_fetch_array($result)){
								echo "<tr>";
								echo "<td><img width='70' src='../admin/".$res['B_IMG']."'></td>";
								echo "<td> <a href='Book.php?value=".$res['B_ID']."'style='color:#FF8329'>".$res['B_TITLE']."</a><br>";
								echo "Author: ".$res['B_AUTHOR']."<br>";
								echo "Price: ₱".$res['B_PRICE']."</td>";
								
								
								
								
								
								
							}
							
							
							
							
							
							
							
							
							
							
							?>
							
							
							
							
							
                        </tbody>
                    </table>
                    
                </div></form>
                </div>
            </div>

      
   <br>

    </div> 
   <hr>

    <div class="container">
        <center><h2><b>People love us!</b></h2></center><br>
        <div class="col-sm-6">
            <center> <font style="color:orange;" size="5">“</font> <font size="3"> I don't understand why anyone actually buys books from the book store.  
                <br> I  just saved basically more than ₱100 using this site!  </font><font style="color:orange;" size="5">”</font> <br> <br>
                <img src="assets/img/twitter.png" width="5%"><br><br> <b>@alexssuu</b>
            </center>
        </div>
                <div class="col-sm-6">
            <center> <font style="color:orange;" size="5">“</font> <font size="3"> This website saved me from my financial crisis! 
                <br> I can now read books at a low price.  </font><font style="color:orange;" size="5">”</font><br><br>
            <img src="assets/img/twitter.png" width="5%"><br><br> <b>@omiiii</b></center>
        </div>
    </div>
    <hr>
                 <div class="table-responsive">
                <div id="bg-top" style="margin:0px;color:rgb(62,62,62);width:100%;">
                <h2 class="text-center" style="padding-top:2%;margin:20px;"><i class="fa fa-trophy"></i>&nbsp;<b>Top Books<br><br></h2>
            </div>
   <div id="content">

		    <div class="ocarousel_example_programmatic">
                <div class="ocarousel_window">
				<?php $query="select * from book_details order by RENT_COUNT desc limit 10";
			$result1=@mysqli_query($con,$query);
			
			
			while($res1=mysqli_fetch_array($result1)){
				
				echo "<div class='example_programmatic_slide'><img src='../admin/".$res1['B_IMG']."' width='100%'></div>";
			}
			
			
			
			?>
              
                </div>

                        <center><span class="ocarousel_pagination_current"></span>
                
                <span class="ocarousel_pagination_total"></span>
                <div class="ocarousel_indicators"></div> </center>
                <br />
 
                    </div></div>
        </div>    
</div>
 <img src="assets/img/flat1.png" width="100%">
</body>

</html>
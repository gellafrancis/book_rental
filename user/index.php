<?php include("functions/init.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Antic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arsenal">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Basic">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <style>
 img {
  margin-left:auto;
  margin-right:auto;
  display:block;
}

    </style>    
</head>

<body style="width:100%;">
    <section class="d-flex flex-column justify-content-between" id="bg" style="background-image:url(&quot;assets/img/DDD.jpg&quot;);width:100%;">
        <div id="bg-top">
            <nav class="navbar navbar-light navbar-expand-md">
                <div class="container-fluid"><a class="navbar-brand" href="#" style="color:rgba(255,255,255,0.9);background-image:url(&quot;assets/img/book.png&quot;);background-size:70%;"></a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon" style="color:#ffffff;"></span></button>
                    <div
                        class="collapse navbar-collapse" id="navcol-1">
                        <ul class="nav navbar-nav mx-auto" style="font-family:Basic, sans-serif;font-weight:bold;">
                            <li class="nav-item" role="presentation"><a class="nav-link" href="index.php" style="color:rgb(186,160,160);">HOME</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="Rent.php" style="color:#ffffff;">RENT</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="#" style="color:#ffffff;">RETURN</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="logout.php" style="color:rgb(255,255,255);">LOGOUT</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="#" style="color:rgb(255,255,255);"></a></li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li class="nav-item" role="presentation"><a class="nav-link active" href="Login.php" style="color:rgba(255,255,255,0.9);"><i class="fa fa-user" style="font-size:20px;"></i></a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="#" style="color:rgba(255,255,255,0.5);">Welcome <?php if(logged_in()){echo $_SESSION['email']; }else{redirect("login.php");} ?>!</a></li>
                        </ul>
                </div>
        </div>
        </nav>
        <h1 class="text-center" style="margin:70px;color:rgb(255,255,255);font-family:Antic, sans-serif;font-style:oblique;"><br><a class="justify-content-center align-content-center" href="#" style="margin:20px;width:100px;background-size:contain;line-height:0px;color:rgb(255,255,255);font-weight:bold;font-style:normal;">Find your books here.</a></h1>
        <h4 style="margin:10px;color:rgb(255,255,255);font-family:Antic, sans-serif;font-style:oblique;padding:0;margin-top:0px;line-height:0px;"><br></h4>
        <form class="search-form" style="padding-right:10%;padding-left:10%;" method="GET" action="Rent.php">
            <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-search"></i></span></div><input class="form-control" type="text" name="search" placeholder="Search by ISBN, Title, Keyword, or Author.">
                <div class="input-group-append"><button class="btn btn-light" type="submit"  style="background-color:rgb(255,131,41);color:rgb(255,255,255);">Search </button></div>
            </div>
        </form>
        <p style="color:rgb(255,255,255);font-family:Basic, sans-serif;font-weight:bold;">RENT. READ. RETURN.</p>
        </div>
        <div id="bg-bottom" style="margin-bottom:10px;background-image:url(&quot;orange-bg-refonly.jpg&quot;);background-size:cover;"></div>
    </section>
    <section class="d-flex flex-column justify-content-between" id="bg" style="background-image:url(&quot;assets/img/orange.jpg&quot;);height:20%;width:100%;">
        <div id="bg-top" style="margin:0px;color:rgb(255,255,255);width:100%;">
            <h1 class="text-center" style="padding-top:2%;">Book Rental Services</h1>
            <p><br>Book Rentals provides citizens with affordable textbooks and to increase their interests in books.<br>Rent your books now.<br><br></p>
        </div>
    </section>
    <section class="d-flex flex-column justify-content-between" id="bg1" style="background-image:url(&quot;none&quot;);height:100px;">
        <div class="container">
            <div class="row" style="padding-top:2%;">
                <div class="col">
                    <p class="text-center one" style="padding-top:5%;padding-bottom:5%;height:100%;"><i class="fa fa-book" style="font-size:25px;"></i>&nbsp;Hundreds of Books</p>
                </div>
                <div class="col">
                    <p class="text-center one" style="padding-top:5%;padding-bottom:5%;height:100%;"><i class="fa fa-star" style="font-size:25px;"></i>&nbsp;Good Quality Reads</p>
                </div>
                <div class="col">
                    <p class="text-center one" style="padding-top:5%;padding-bottom:5%;height:100%;"><i class="fa fa-motorcycle" style="font-size:25px;"></i>&nbsp;Fast Arrival of Book Rents</p>
                </div>
            </div>
        </div>
    </section>
    <div id="bg-top" style="margin:0px;color:rgb(62,62,62);width:100%;">
        <h2 class="text-center" style="padding-top:2%;margin:20px;">Never rented a book before?</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <h6 class="text-center"><br><strong>What if I want to keep my book?</strong><br><br></h6><img src="assets/img/reading.png" width="20%"></div>
            <div class="col">
                <h6 class="text-center"><br><strong>How do I return my books?</strong><br><br></h6><img src="assets/img/books.png" width="20%"></div>
            <div class="col">
                <h6 class="text-center"><br><strong>Can I highlight in my books?</strong><br><br><img src="assets/img/marker.png" width="20%"><br></h6>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p><br>You can always extend or purchase a rental, so feel free to change your mind.<br><br></p>
            </div>
            <div class="col">
                <p><br>Returning rentals is free! Just send back your books in any box with our prepaid shipping label<br><br></p>
            </div>
            <div class="col">
                <p><br>Highlighting is okay but please don't write in our books. (Be nice! Other people will use them.)<br><br></p>
            </div>
        </div>
    </div>
    <div id="bg-top" style="margin:0px;color:rgb(62,62,62);width:100%;">
        <h2 class="text-center" style="padding-top:2%;margin:20px;"><i class="fa fa-trophy"></i>&nbsp;Top Books<br><br></h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col"><img src="assets/img/BookCover/Noli Me Tangere.jpg" width="30%"></div>
            <div class="col"><img src="assets/img/BookCover/Silent Spring.jpg" width="30%"></div>
            <div class="col"><img src="assets/img/BookCover/The Fault In Our Stars.jpg" width="30%"></div>
            <div class="col"><img src="assets/img/BookCover/Call Me By Your Name.jpg" width="30%"></div>
        </div>
        <div class="row">
            <div class="col">
                <p style="font-weight:bold;">Noli Me Tangere</p>
            </div>
            <div class="col">
                <p style="font-weight:bold;">Silent Spring</p>
            </div>
            <div class="col">
                <p style="font-weight:bold;">The Fault in our Stars</p>
            </div>
            <div class="col">
                <p style="font-weight:bold;">Call Me by Your Name</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col"><img src="assets/img/BookCover/The Ones Who Walk Away from Omelas.jpg" width="30%"></div>
            <div class="col"><img src="assets/img/BookCover/Outliers The Story of Success.jpg" width="30%"></div>
            <div class="col"><img src="assets/img/BookCover/MacBeth.jpg" width="30%"></div>
            <div class="col"><img src="assets/img/BookCover/2318271.jpg" width="30%"></div>
        </div>
        <div class="row">
            <div class="col">
                <p style="font-weight:bold;">The Ones Who Walk Away from Omelas</p>
            </div>
            <div class="col">
                <p style="font-weight:bold;">Outliers: The Story of Success</p>
            </div>
            <div class="col">
                <p style="font-weight:bold;">MacBeth</p>
            </div>
            <div class="col">
                <p style="font-weight:bold;">The Last Lecture</p>
            </div>
        </div>
    </div>
    <div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="#">Rentals</a></li>
                            <li><a href="#">Payment</a></li>
                            <li><a href="#">Book Returns</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <h3>About</h3>
                        <ul>
                            <li><a href="#">Company</a></li>
                            <li><a href="#">Team</a></li>
                            <li><a href="#"></a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 item text">
                        <h3></h3>
                        <p><img src="assets/img/book.png" style="width:80px;"></p>
                    </div>
                    <div class="col item social"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-instagram"></i></a></div>
                </div>
                <p class="copyright">Book Rentals © 2018</p>
            </div>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>
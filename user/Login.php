<?php include("functions/init.php");?>

<html>
<head>
	    <meta charset="UTF-8">
		<title>Login</title>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.2/normalize.css"/>
                <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<style>
body {
  margin: 0 0;
  padding:10px;
  text-align:center;
            background-image:url('assets/img/DDD_Blur.jpg');
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
            background-size: cover;
}

#bg {
  position:fixed; 
  top:-50%; 
  left:-50%; 
  width:200%; 
  height:200%;
}

#bg img {
 position:absolute; 
 top:0; 
 left:0; 
 right:0; 
 bottom:0; 
 margin:auto; 
 min-width:50%;
 min-height:50%;
}

.title {
  position:relative;
  font-family: 'Myriad Pro','Helvetica Neue', Helvetica;
  font-weight:bold;
  font-size: 20px;
  text-shadow: 0px 1px 2px rgba(255,255,255,.5);
  color: #444;
  text-align:center;
}

.title1 {
  position:relative;
  font-family: 'Myriad Pro','Helvetica Neue', Helvetica;
  font-weight:bold;
  font-size: 40px;
  text-shadow: 0px 1px 2px rgba(255,255,255,.5);
  color: #fff;
  text-align:center;
}

form {
  background: none;
  margin: 20px auto 0;
  padding: 10px;
  width: 280px;
}

input {
  display: block;
  font-size: 14px;
  width:240px;
  margin: 10px auto;
  padding: 10px 8px 10px 8px;
  border-radius: 5px;
  box-shadow: inset 0 1px 2px rgba(0,0,0, .55), 0px 1px 1px rgba(255,255,255,.5);
  border: 1px solid #666;
}

input {
  opacity: 0.5;
}

input:hover,
input:focus {
  opacity: .7;
  color:#000;
  border: 1px solid #08c;
  box-shadow: 0px 1px 0px rgba(255,255,255,.25),inset 0px 3px 6px rgba(0,0,0,.25);
}

input[type="text"]:focus,
input[type="password"]:focus {
  border: 1px solid orangered;
  outline: none;
}

input[type="submit"] {
  appearance: none;
  opacity: .99;
  width:200px;
  background: #08c;
  border: 1px solid #0a5378;
  border-radius: 4px;
  color: #eee;
  text-shadow:0px -1px 0px rgba(0,0,0,.5);
}

input[type="submit"]:hover {
  background: #08c;
  width:200px;
  border: 1px solid #0a5378;
  border-radius: 3px;
  -webkit-transition: all 0.40s ease-out;
  transition: all 0.40s ease-out;
}
.con{
    padding-top:50%;
}

a{
    color:white;
}
</style>
</head>
        
            
<body>
<?php if(logged_in()){ redirect("index.php"); }?>
    <form method="POST">       
    <div class="con">
  <div class="title1">•BookRentals•</div> 
  <br>
  <div class="title">Login</div>

  <div class="col-lg-6 col-lg-offset-3">
          <?php echo display_message();?>
          <?php validate_user_login();?>
  </div>
  <input type="email" name="email" placeholder="email" required>
  <input type="password" name="password" placeholder="Password" required>
  <input type="submit" value="Log in"> <a href="forgotpassword.php" style="text-decoration:none;"><font size="2" style="color:#B8B8B8;">Forgot password</font></a><br><br><br>
  <font style="color:#B8B8B8;">No Account Yet? </font> <a href="registration_pt1.php">Sign Up</a> <br>
 
    </div>
</form>
</body>
</html>
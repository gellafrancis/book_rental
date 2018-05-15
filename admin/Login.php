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
  background-color: 	#404040;
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
  font-size: 20px;
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
  border: 1px solid #666;
}


input:hover,
input:focus {
  color:#000;
  border: 1px solid #08c;
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
h4{
    color:white;
}
</style>
</head>
        
            
<body>

    <form method="POST">       
    <div class="con">
        <div class="title1"><img src="assets/img/book.png" width="30%"> <br>• BookRentals •</div> 
  <h4>Administrator Login</h4>
  <?php echo display_message();?>
  <?php validate_user_login();?>
  <input type="text" name="email" value="email" placeholder="email" >
  <input type="password" name="password" value="password" placeholder="Password">
  <input type="submit" value="Log in"> <a href="forgotpassword.php" style="text-decoration:none;"><font size="2" style="color:#B8B8B8;">Forgot password</font></a><br><br><br>
 
    </div>
</form>
</body>
</html>
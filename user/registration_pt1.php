<?php include("includes/reg.php"); ?>
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
</style>
</head>
        
            
<body>

<form method="POST">       
    <div class="con">
  <div class="title1">• BookRentals •</div> 
  <br>
  <div class="title">Sign Up</div>
  <h4 style="color:white;">Step 1</h4>
 <?php  validate_user_registration1(); ?>

  <center>
  <table>
      <tr>
          <td><input type="text" placeholder="Firstname" name="first_name" pattern="^[a-zA-Z]+(?:[\s.]+[a-zA-Z]+)*$" required="required"/></td>
          <td> <input type="text" placeholder="Lastname" name="last_name" pattern="^[a-zA-Z]+(?:[\s.]+[a-zA-Z]+)*$" required="required"/></td>
      </tr>
  </table>
      <input type="email" placeholder="Email Address" name="email" style="width:480px" required="required" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}"/>
                     
      <br>
   </center>
  <input type="submit" text="Next" value="Next"><br>
     <a href="Login.php" style="text-decoration: none;">Go Back</a> 

    </div>
</form>
</body>
</html>


<?php include("includes/reg.php"); ?>

input {
  opacity: 0.9;
}

input:hover,
input:focus {
  opacity: .8;
  color:#000;
  border: 1px solid #08c;
}
</style>
</head>        
<body>

<form method="POST">       
    <div class="con">
  <div class="title1">• BookRentals •</div> 
  <br>
  <div class="title">Sign Up</div>
  <h4 style="color:white;">Step 2</h4>
  <?php  validate_user_registration2() ?>
  <center>
  <table>
      <tr>
          <td><input type="date" name="bday" placeholder="Birthday" max="2000-12-31" min="1900-01-01" required="required"/></td>
      </tr>
      <tr>
          <td><input type="text" name="contactnum" value=""  required="required" maxlength="11" pattern="[0]{1}[9]{1}[0-9]{9}" placeholder="09xxxxxxxxx"/></td>
      </tr>
  </table>
      
      <textarea  type="text" name="address" placeholder="Full Address" style="width:480px" required="required" ></textarea>
          <table>
      <tr>
          <td><input type="password" name="password1" placeholder="Enter password"  required="required"/></td>
          <td><input type="password" name="password2" placeholder="Confirm password"  required="required"/></td>
      </tr>
  </table>  
      <br>
   </center>
  <input type="submit" value="Submit"><br>
     <a href="registration_pt1.php" style="text-decoration: none;">Go Back</a> 

    </div>
</form>
</body>
</html>
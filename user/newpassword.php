<?php include("includes/reg.php"); ?> input { opacity: 0.9; } input:hover, input:focus { opacity: .8; color:#000; border: 1px solid #08c; }
</style>
</head>

<body>

<?php //new_password(); ?>
<?php //echo display_message();?>

   <form method="POST">
      <div class="con">
         <div class="title1">• BookRentals •</div>
         <br>
         <div class="title">Change Password</div>
         <?php  validate_password(); ?>
         <center>
            <table>
               <tr>
                  <td>
                     <input type="password" name="password1" placeholder="Enter New password" required="required" />
                  </td>
                  <td>
                     <input type="password" name="password2" placeholder="Confirm Confirm password" required="required" />
                  </td>
               </tr>
            </table>
            <br>
         </center>
         <input type="submit" value="Submit">
         <br>
         <a href="forgotpassword.php" style="text-decoration: none;">Go Back</a>

      </div>
   </form>

</body>

</html>
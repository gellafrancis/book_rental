<?php include("functions/init.php");?>
<!doctype html>
    <html>
    <title>Profile</title>

    <?php
          
         $id=$_SESSION['id1'];
          
         $query="select * from usr_details where u_id='$id'";
         $result=@mysqli_query($con,$query);
         
         while($res=mysqli_fetch_array($result))
         {

           
           $fn1=$res['u_firstname'];
           $ln2=$res['u_lastname'];
           $email=$res['u_email'];
           $add=$res['u_address'];
           $num=$res['u_contactnum'];
           
        
         }
         ?>

    <head>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <link rel="shortcut icon" href="assets/img/book2.png" type="image/png">
            <link href="//cdn.muicss.com/mui-0.9.38/css/mui.min.css" rel="stylesheet" type="text/css" />
            <script src="//cdn.muicss.com/mui-0.9.38/js/mui.min.js"></script>
            <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
            <link href="css/bootstrap.css" rel="stylesheet" />
            <link href="css/bootstrap-theme.css" rel="stylesheet" />
            <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css" type="text/css"/>
            <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
            <link rel="stylesheet" href="css/bootstrap-theme.min.css" type="text/css">
            <link rel="shortcut icon" href="logow.png" type="image/png">
            <link rel="stylesheet" href="css/scrolling-nav.css" type="text/css">
            <link rel="stylesheet" href="bootstrap-datepicker.css" type="text/css"/>
            <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
 
            <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
            <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
            <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

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
            html,
            body {
              height: 100%;
              background-color: #F0F0F0;
              font-family:Arial;
            }

            html,
            body,
            input,
            textarea,
            buttons {
              -webkit-font-smoothing: antialiased;
              -moz-osx-font-smoothing: grayscale;
              text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.004);
            }

            #header {
              position: fixed;
              top: 0;
              right: 0;
              left: 0;
              z-index: 2;
              transition: left 0.2s;
            }

            #sidedrawer {
              position: fixed;
              top: 0;
              bottom: 0;
              width: 200px;
              left: -200px;
              overflow: auto;
              z-index: 2;
              background-color: #282828;
              transition: transform 0.2s;
              color:white;
            }

            #content-wrapper {
              min-height: 100%;
              overflow-x: hidden;
              margin-left: 0px;
              transition: margin-left 0.2s;

              margin-bottom: -160px;
              padding-bottom: 160px;
            }

            #footer {
              height: 160px;
              margin-left: 0px;
              transition: margin-left 0.2s;
            }

            @media (min-width: 768px) {
              #header {
                left: 200px;
              }

              #sidedrawer {
                transform: translate(200px);
              }

              #content-wrapper {
                margin-left: 200px;
              }

              #footer {
                margin-left: 200px;
              }

              body.hide-sidedrawer #header {
                left: 0;
              }

              body.hide-sidedrawer #sidedrawer {
                transform: translate(0px);
              }

              body.hide-sidedrawer #content-wrapper {
                margin-left: 0;
              }

              body.hide-sidedrawer #footer {
                margin-left: 0;
              }
            }

            #sidedrawer.active {
              transform: translate(200px);
            }

            .sidedrawer-toggle {
              color: #fff;
              cursor: pointer;
              font-size: 20px;
              line-height: 20px;
              margin-right: 10px;
            }

            .sidedrawer-toggle:hover {
              color: #fff;
              text-decoration: none;
            }

       
             #sidedrawer-brand {
              padding-top:20px;
              padding-left: 20px;
            }

            #sidedrawer ul {
              list-style: none;
            }

            #sidedrawer > ul {
              padding-left: 0px;
            }

            #sidedrawer > ul > li:first-child {
              padding-top: 15px;
            }

            #sidedrawer strong {
              display: block;
              padding: 15px 22px;
              cursor: pointer;
            }

            #sidedrawer strong:hover {
              background-color: #484848;
              text-decoration: none;
              color:white;
              border-left: solid 5px #ffb733;
            }
            
            a:visited{
                color:white;
                text-decoration: none;
            }               
            .active{
               background-color: #484848; 
               border-left: solid 5px #fff;
            }


            #sidedrawer strong + ul > li {
              padding: 6px 0px;
            } 

            .mui-appbar{
                background:#ffb733;
                height:50px;
            }
            a.disable {
                pointer-events: none;
                cursor: default;
                font-size:15px;
                color:orange;
             }  
             a{
                 color:white;
                 text-decoration: none;
             }
             a:hover{
                 color:orange;
                 text-decoration: none;
             }
             .header{
                 overflow: hidden;
                 position:fixed;
             }
             mui--text-title{
                 padding-top: 10px;
             }
               .modal-header {
            	padding-bottom: 5px;
            }
            
            .modal-footer {
                	padding: 10px;
            	}
         
                
            .modal-footer .btn-group button {
            	height:100%;
            	border-top-left-radius : 0;
            	border-top-right-radius : 0;
            	border: none;
            	border-right: 1px solid #ddd;
            }
            	
            .modal-footer .btn-group:last-child > button {
            	border-right: 0;
            }
            
            .modal {
              text-align: center;
              padding: 0!important;
             
            }
            
            .modal:before {
              content: '';
              display: inline-block;
              height: 100%;
              vertical-align: middle;
              margin-right: -4px;
            }
            
            .modal-dialog {
              display: inline-block;
              text-align: left;
              vertical-align: middle;
            }  
            tr {
            padding-bottom:1%;
            padding-top:1%;
            
           }
        
            td{
                padding-bottom:1%;
                padding-top:1%;
                padding-right:1%;
                font-size:20px;
            }
            hr{
                background-color: #fff;
                border: 8px solid #d3d3d3;
                opacity: 0.5;
            }

            @media only screen and (min-width:180px) and (max-width:679px)
            {
            table
            {
             width:100%;
            }
            table .column1
            {
             visibility:hidden;
             display:none;
            }
            table th
            {
             visibility:visible;
             display:block;
             font-size:20px;
            }
            input
            {
               -moz-box-sizing: border-box;
                -webkit-box-sizing: border-box;
                -ms-box-sizing: border-box;
                -o-box-sizing: border-box;
                box-sizing: border-box;
                position: auto;
            }
            }

            .panel {
                overflow: auto;
                position: auto;
                box-sizing: border-box;
            }
            
            textarea {
               resize: none;
           }  
           
             .panel.panel-default{
                     box-shadow: 5px 5px 5px #888888;
             }           
    </style>
    <script>
            $(document).ready(function() {
                 $('#myTable').DataTable();
            } );
            $('#myTable').dataTable( {
                responsive: true
            } );
            
            jQuery(function($) {
              var $bodyEl = $('body'),
                  $sidedrawerEl = $('#sidedrawer');


              function showSidedrawer() {
                var options = {
                  onclose: function() {
                    $sidedrawerEl
                      .removeClass('active')
                      .appendTo(document.body);
                  }
                };

                var $overlayEl = $(mui.overlay('on', options));

                $sidedrawerEl.appendTo($overlayEl);
                setTimeout(function() {
                  $sidedrawerEl.addClass('active');
                }, 20);
              }


              function hideSidedrawer() {
                $bodyEl.toggleClass('hide-sidedrawer');
              }


              $('.js-show-sidedrawer').on('click', showSidedrawer);
              $('.js-hide-sidedrawer').on('click', hideSidedrawer);
            });
            var $titleEls = $('strong', $sidedrawerEl);

            $titleEls
              .next()
              .hide();

            $titleEls.on('click', function() {
              $(this).next().slideToggle(200);
            });

function myVal() {
         var a = document.getElementById("firstname").value;
    document.getElementById("demo").innerHTML = a;
         var b = document.getElementById("lastname").value;
    document.getElementById("demo1").innerHTML = b;
         var c = document.mainForm.gender.value;
    demo2.innerHTML = c;
         var d = document.getElementById("email").value;
    document.getElementById("demo3").innerHTML = d;
         var e = document.getElementById("cn").value;
    document.getElementById("demo4").innerHTML = e;
         var f = document.getElementById("bdo").value;
    document.getElementById("demo5").innerHTML = f;
         var g = document.getElementById("expertise").value;
    document.getElementById("demo6").innerHTML = g;
         var h = document.getElementById("did").value;
    document.getElementById("demo7").innerHTML = h;
         var i = document.getElementById("num1").value;
    document.getElementById("demo8").innerHTML = i;
    
    }

        function realAge(birthDate, ageDate) {
            if (Object.prototype.toString.call(birthDate) !== '[object Date]')
                birthDate = new Date(birthDate);
            if (typeof ageAtDate == "undefined")
                ageDate = new Date();
            else if (Object.prototype.toString.call(ageDate) !== '[object Date]')
                ageDate = new Date(ageDate);
            if (ageDate == null || birthDate == null)
                return null;

        var _m = ageDate.getMonth() - birthDate.getMonth();
        return (ageDate.getFullYear()) - birthDate.getFullYear() 
                - ((_m < 0 || (_m === 0 && ageDate.getDate() < birthDate.getDate())) ? 1 : 0)
        }

        function showAge() {
            $('#age').text(realAge($('#bdo').val()))
            var span = document.getElementById('age');
            var hiddenage = document.getElementById('hiddenage');
            hidden.value = span.innerHTML;
        }

        $(function () {
            $("#datepicker").datepicker({ 
            autoclose: true, 
            todayHighlight: true
            }).datepicker('update', new Date());
            showAge();

        });
      </script>
      </head>
      <body>
    <div id="sidedrawer" class="mui--no-user-select">
    <div id="sidedrawer-brand" class="mui--appbar-line-height">
        <span class="mui--text-title" ><font size="5">BookRentals</font></span>
    </div>
    <div class="mui-divider"></div>
    <ul>
      <li>
        <a class="disable"><strong><i class="fa fa-user"></i> &nbsp;<?php echo $_SESSION['email'] ?></strong></a> 
      </li> 
       <li >
          <a href="UserList.php"><strong><i class="fa fa-book"></i> &nbsp;User List</strong></a>
      </li>         
      <li>
          <a href="BookList.php"><strong><i class="fa fa-book"></i> &nbsp;Book List</strong></a>
      </li>
      <li>
          <a href="AdminList.php"><strong><i class="fa fa-lock"></i> &nbsp;Admin List</strong></a>
      </li>
       <li>
          <a href="Sales.php"><strong><i class="fa fa-sticky-note"></i> &nbsp;Sales</strong></a>
      </li>
      <br>
       <li>
           <a href="adminprofile.php"><strong><i class="fa fa-user-circle"></i> &nbsp;Account Profile</strong></a>
      </li>
       <li>
           <a href="edithistory.php"><strong><i class="fa fa-history "></i> &nbsp;Edit History</strong></a>
      </li> 
       <li>
           <a href="about.php"><strong><i class="fa fa-info-circle"></i> &nbsp;About</strong></a>
      </li>
       <li>
           <a href="logout.php"><strong><i class="fa fa-sign-out "></i> &nbsp;Logout</strong></a>
      </li>        
    </ul></div>
    <header id="header">
      <div class="mui-appbar mui--appbar-line-height">
        <div class="mui-container-fluid">
            <a class="sidedrawer-toggle mui--visible-xs-inline-block mui--visible-xs-inline-block js-show-sidedrawer"><span class="glyphicon glyphicon-menu-hamburger" style="font-size:20px;padding-top: 10px;"></span></a>
          <a class="sidedrawer-toggle mui--hidden-xs mui--hidden-sm js-hide-sidedrawer"><span class="glyphicon glyphicon-menu-hamburger" style="font-size:20px;padding-top: 10px;"></span></a>
          <span class="mui--text-title mui--visible-xs-inline-block"></span>
        </div>
      </div>
    </header>
    <div id="content-wrapper">
        
        <div class="mui--appbar-height"></div>
         <img src="nav.png" alt="" width="100%" height="90px" style="margin-bottom: 1%;">
    <br>  
    <br>
   <center>  <div class="mui-container-fluid">
           <div class="row">
             <div class="panel panel-default col-sm-10 col-sm-offset-1 hid" >
              <div class="panel-body">
                <div class="row">
          <form method="POST"  action = "changepassword.php" role="form" id="formfield" name="mainForm">

                      <div class="panel panel-warning col-sm-12"  >
                        <center> <h3><b>Administrator Profile</b></h3></center> 
                          <br>
                        <br>                     
              
                      <center><img src="assets/img/nullDP.png" width="10%"></center>
                        <center> <h3><b><?php echo $fn1 . " ". $ln2?> </b></h3></center> 
                        <br>
                        <hr>
                        <br>
              <table width="100%" class="warning">
			 <tr>
                             <td><h3><b> Information</b></h3></b></td>

                                </tr>					
	                       <tr>
                                    <td><b>Admin ID:</b>  
                                    <td>
                                     <?php echo $id?>
                                    </td>
                                </tr>
  
                                <tr>
                                    <td><b>Name:</b> 
                                    <td>
                                        <?php echo $fn1 . " ". $ln2 ?>
                                   </td>
                                </tr>
                                <tr>
                                 <td><b>Email Address:</b>   
                                <td> 
                                      <?php echo $email ?>
                                </td>
                                </tr>                                
                                 <tr>
                                    <td><b>Mobile Number: </b> 
                                    <td>
                                       <?php echo $num ?>
                                   </td>
                                </tr>                               
                                <tr>
                                    <td><b>Status</b> 
                                    <td>
                                       Active/Deactivated
                                    </td> 
                                </tr> 

                 </table>                                         
			       	</div>
                         
                 </form>
                      
             </div>
              </div>
              </div>
                </div>
   
  </body>
    </html>

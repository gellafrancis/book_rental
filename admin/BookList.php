


<!doctype html>

<?php include("functions/init.php");?>




      
<?php
		   
		   if(isset($_POST['add'])){
			   header('location:addBook.php');
		   }else if(isset($_POST['view'])){
			   $_SESSION['id']=$_POST['view'];
			    header('location:bookinfo.php');
		   }else if(isset($_POST['delete'])){
        $id=$_POST['delete'];

        $query="delete from book_details where B_ISBN='$id'";
        $result=@mysqli_query($con,$query);

        $sql = "INSERT INTO log_history(log_date,  log_activity)";
        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d\TH:i:s.u'); 
        $activity = "Delete Book with an ISBN#: " . $id;
        $sql .= " VALUES ('$date', '$activity')";
        $result = query($sql);


       header('location:booklist.php');
      }
		  
		   ?> 
	<html>
    <title>Book List</title>
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
              background-color: #fff;
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
             .mui-container-fluid{
                 padding-left:2%;
                 padding-right:2%;
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
        <a class="disable"><strong><i class="fa fa-user"></i> &nbsp;<?php if(logged_in()){echo $_SESSION['email']; }else{redirect("login.php");} ?></strong></a> 
      </li>  
       <li >
          <a href="UserList.php"><strong><i class="fa fa-book"></i> &nbsp;User List</strong></a>
      </li>     
      <li  class="active">
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
    <div class="mui-container-fluid">
           
          <h1><strong>Book List</strong></h1>
          <hr>
          <form method="POST" action="BookList.php"> 
        <table class="table table-striped table-bordered display responsive no-wrap " cellspacing="0" width="100%" id="myTable" style="" class="display" >
			<thead>
	    				<tr class="warning">
						<th scope="col"><center>#</center></th>
	      				<th scope="col"><center>Book ID</center></th>						
				  	    <th scope="col"><center>ISBN</center></th> 
	      				<th scope="col"><center>Title</center></th>
	      				<th scope="col"><center>Author</center></th>
	      				<th scope="col"><center>Date Registered</center></th>
                        <th scope="col"><center>Stock</center></th>
	      				<th scope="col"><center>Action</center></th>

	    				</tr>
  				</thead>
  				<tbody>
          <?php 
				$query="Select * from book_details";
				$returnstring = "";
				$result=@mysqli_query($con,$query);
				$counter = 0;
				while($res=mysqli_fetch_array($result)){
					$counter++;
		       echo $returnstring =  
    			
					"<tr>
					<td>" .$counter."</td>
     		        <td>" .$res['B_ID']."</td>			
    		        <td>" .$res['B_ISBN']."</td>
    		      	<td>" .$res['B_TITLE']."</td>
    				<td>" .$res['B_AUTHOR']."</td>
    		       	<td>" .$res['B_REGISTERED']."</td>
    				<td>"  .$res['B_QTY']."</td>
    		        <td><center> <button class='btn btn-warning btn-block' name='view' value='".$res['B_ID']."'>View</button><button class='btn btn-danger btn-block' name='delete' value='".$res['B_ISBN']."'>Delete</button></center></td>
    		    </tr>";
				}
				?>
  				</tbody>
				
                            </table>
                <hr>
			<button  type="submit" class=" btn-warning btn btn-lg" name="add" style="float:right;" ><font>Add New Book</font></button>
			</form> 
		   </div></div>
		   
		
		   
		   
		  
    </div>
    
</div>
		   
		 <script>  
function test(pageNumber)
{

  var page="#page-id-"+pageNumber;
  $('.select').hide()
  $(page).show()

}
</script> 
		   
		   
		   
		   
		   
    
  </body> 
 
    </script>
    </html>

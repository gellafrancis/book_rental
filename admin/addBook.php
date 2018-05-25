
<!doctype html>

<?php include("functions/init.php");?>




  <?php if(isset($_POST['save'])){
	  
				 $isbn=escape($_POST['isbn']);
				 $title=escape($_POST['btitle']);
				 $author=escape($_POST['author']);
				 $genre=escape($_POST['genre']);
				 $publisher=escape($_POST['publisher']);
				 $bdo=escape($_POST['bdo']);
				 $summary=escape($_POST['summary']);
				 $desc=escape($_POST['desc']);
				 $price	=escape($_POST['price']);
				 $quantity=escape($_POST['quantity']);
				 $dateadd=escape(date("Y/m/d"));
				 
				 
				 $check="select B_ISBN from book_details where B_ISBN='$isbn'";
				 $res=@mysqli_query($con,$check);
				 $num_rows=@mysqli_num_rows($res);
				 
				 
				 
			
				 
				
				 if($num_rows==0) {
				  $query="INSERT INTO `book_details`( `B_ISBN`, `B_TITLE`, `B_GENRE`, `B_AUTHOR`, `B_PUBLISHER`, `B_DESC`, `B_PRICE`, `B_QTY`, `B_REGISTERED`, `B_PUBLISHED`, `B_OTHER`) 
				  VALUES ('$isbn','$title','$genre','$author','$publisher','$desc','$price','$quantity','$dateadd','$bdo','$summary')";
                  @mysqli_query($con,$query);
                  
                  $sql = "INSERT INTO log_history(log_date,  log_activity)";
                  $date = date('Y-m-d\TH:i:s.u');
                    $activity = "ADD Book with an ISBN#: " . $isbn;
                    $sql .= " VALUES ('$date', '$activity')";
                    $result = query($sql);
				  
				  $getid="select B_ID from book_details where B_ISBN='$isbn' LIMIT 1";
				  $res=@mysqli_query($con,$getid);
				  
				  while($result=mysqli_fetch_array($res)){
					  $B_ID=$result['B_ID'];
					  
				  }
				  
				  
				  $images=$_FILES["image"]["name"];
                $name1=$_FILES["image"]["tmp_name"];
                
               
                $half=explode(".",$images);
                $filetype=end($half);

                
               
                if($images!=""){
                    
                if($filetype=="jpg"||$filetype=="JPG"||$filetype=="png"||$filetype=="JPEG"){
                    
                
                    $target="images/".$B_ID.".".$filetype;
                    move_uploaded_file($name1,$target);
                    @mysqli_query($con,"Update book_details set B_IMG='$target' where B_ID='$B_ID'");
				  unset($_SESSION['error']);
				  unset($_SESSION['exist']);
				  header('location:BookList.php');
                  
                  


				}else{
					$_SESSION['error']="The file type ". $filetype." is not supported";
					
				}
				}else{
					$_SESSION['exist']="The ISBN ". $isbn." exists!";
					
					
				}
				  
				  }
				  
				 
				  }?>





    <html>
    <title>Add Book</title>
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
                background-color: #d3d3d3;
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
         var a = document.getElementById("isbn").value;
    document.getElementById("info").innerHTML = a;
         var b = document.getElementById("btitle").value;
    document.getElementById("info1").innerHTML = b;
          var c = document.getElementById("author").value;
    document.getElementById("info2").innerHTML = c;   
         var d = document.getElementById("bdo").value;
    document.getElementById("info3").innerHTML = d;
         var e = document.getElementById("summary").value;
    document.getElementById("info4").innerHTML = e;
         var f = document.getElementById("desc").value;
    document.getElementById("info5").innerHTML = f;
         var g = document.getElementById("price").value;
    document.getElementById("info6").innerHTML = g; 
		var i = document.getElementById("genre").value;
    document.getElementById("info7").innerHTML = i; 
	var j = document.getElementById("publisher").value;
    document.getElementById("info8").innerHTML = j; 
	var k = document.getElementById("quantity").value;
    document.getElementById("info9").innerHTML = k; 
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
        <a class="disable"><strong><i class="fa fa-user"></i> &nbsp;<?php if(logged_in()){echo $_SESSION['email']; }else{redirect("login.php");} ?></strong></a> 
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
             <div class="panel panel-default col-sm-8 col-sm-offset-2" >
              <div class="panel-body">
                  <form method="POST" enctype="multipart/form-data" role="form" id="formfield" name="mainForm" action="addBook.php">
                <div class="row">

                        
                            <input type="hidden" name="action" value="add_form" /> 

                            <font size="6"><h2></h2><b> Add New Book</b></h2></font>
                            <br>
                            <h4><font color="red">All fields are required.</font></h4>
							
							
							<?php if(isset($_SESSION['error'])){?>
							<h3><font color="red"><?php if (isset($_SESSION['error'])){echo $_SESSION['error'];}?></font></h3>	<?php }?>
							<?php if(isset($_SESSION['exist'])){?><h3><font color="red"><?php if (isset($_SESSION['exist'])){echo $_SESSION['exist'];}?></font></h3><?php }?>
					
							
						
                            <br><br>

                    <center>   
                            <table width="100%" cellspacing="1" cellpadding="1" class = "table table-responsive">

                                <tr>
                                    <td><b>ISBN</b>  
                                    <td>
                                     <input class="form-control" type="number" name="isbn" value="" placeholder="ISBN" required="required" id="isbn"/>  
                                    </td>
                                </tr>
  
                                <tr>
                                    <td><b>Title:</b> 
                                    <td>
                                        <input class="form-control" type="text" name="btitle" value="" placeholder="Book Title" required="required" id="btitle" pattern="^[a-zA-Z]+(?:[\s.]+[a-zA-Z]+)*$"/>
                                   </td>
                                </tr>
                                 <tr>
                                    <td><b>Author:</b> 
                                    <td>
                                        <input class="form-control" type="text" name="author" value="" placeholder="Author" required="required" id="author" pattern="^[a-zA-Z]+(?:[\s.]+[a-zA-Z]+)*$"/>
                                   </td>
                                </tr>   
									<tr>
                                    <td><b>Genre:</b> 
                                    <td>
										<select name="genre" id="genre" required>
                                        
										<option value="" selected="selected" disabled >Select Genre</option>
							
										<option value="Comedy">Comedy</option>
										<option value="Drama">Drama</option>
										<option value="Fiction">Fiction</option>
										<option value="History">History</option>
										<option value="Horror">Horror</option>
										<option value="Mystery">Mystery</option>
										<option value="Psych">Psych</option>	
										<option value="Romance">Romance</option>
										<option value="Science">Science</option>
										
										</select>
								   </td>
                                </tr>
								<tr>
                                    <td><b>Publisher:</b> 
                                    <td>
                                        <input class="form-control" type="text" name="publisher" value="" placeholder="Publisher" required="required" id="publisher" pattern="^[a-zA-Z]+(?:[\s.]+[a-zA-Z]+)*$"/>
                                   </td>
                                </tr> 
								
                                <tr>
                                    <td><b>Date Published:</b> 
                                    <td>
                                        <input  name="bdo" type="date"  onChange="showAge()" id="bdo" class="form-control" type="date" required="required" style="width:200px"/> 
                                    </div> 
                                    </td> 
                                </tr> 
                                
                                <tr>
                                 <td><b>Short Summary:</b>   
                                <td> 
                                    <textarea class="form-control" name="summary"   id="summary"  ></textarea>
        
                                </td>
                                </tr>
                                 <tr>
                                 <td><b>Other Description:</b>   
                                <td> 
                                    <textarea class="form-control" name="desc"   id="desc"  ></textarea>
        
                                </td>
                                </tr>                               
                                
                                <tr>
                                  <td><b>Price</b>  
                                    <td>
                                     <input class="form-control" type="number" name="price" value="" placeholder="0.00" required="required" id="price" style="width:100px" pattern="^\d*(\.\d{0,2})?$"/>  
                                    </td>
                                </tr>
								<tr>
                                  <td><b>Quantity</b>  
                                    <td>
                                     <input class="form-control" type="number" name="quantity" value="" required="required" id="quantity" style="width:100px" pattern="^\d*(\.\d{0,2})?$"/>  
                                    </td>
                                </tr>
                                <tr>
                                    
                                    <td> <b>Upload Book Cover:</b></td>
                                    <td><input class=""  type="file" name="image" value="image" size="" style="width:200px" accept="image/x-png,image/jpeg" id="image" required/></b></td>
									
                                </tr>
								<tr>
								<td colspan="2" align="center"></td>
								</tr>
                            </table>
                            </center>
        <input type="reset" name="btn" value="Reset"  class="btn btn-default" data-modal-type="confirm" style="float:right;margin-right: 50px;"/>
        <button type="button"  name="btn" value="Submit" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class="btn btn-warning" onClick="myVal()" style="float:right;margin-right: 5px;"><font>Save Information</font></button>                            
                            </div>
							
							
							
							

<div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <font size="5"> <b>  Confirm Submission</b></font>
            </div>
            <div class="modal-body">
                Are you sure you want to submit the following details?
                <table class="table table-bordered">
                    <tr>
                        <th>ISBN:</th>
                        <td id="info"></td>
                    </tr>
                    <tr>
                        <th>Title:</th>
                        <td id="info1"></td>
                    </tr>
                    <tr>
                        <th>Author:</th>
                        <td id="info2"></td>
                    </tr>
					
					
                     <tr>
                        <th>Date Published:</th>
                        <td id="info3"></td>
                    </tr>
                     <tr>
                        <th>Short Summary:</th>
                        <td id="info4"></td>
                    </tr>
                     <tr>
                        <th>Description:</th>
                        <td id="info5"></td>
                    </tr>
                    <tr>
                        <th>Price:</th>
                        <td id="info6"></td>
                    </tr>
					<tr>
                        <th>Genre:</th>
                        <td id="info7"></td>
                    </tr>
					<tr>
                        <th>Publisher:</th>
                        <td id="info8"></td>
                    </tr>
					<tr>
                        <th>Quantity:</th>
                        <td id="info9"></td>
                    </tr>

                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <button id="submit" value="submit" name="save" type="submit" class="btn btn-success success">Submit</button>
			
            </div>   
        </div>
    </div>
    
</div>

 </form>
            </div>
             </div>
              </div>
              </div>
                </div>
   
  </body>
    </html>

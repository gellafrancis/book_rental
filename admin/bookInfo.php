
<?php include("functions/init.php");

book_checker();
?>
    
<?php 

               $id=$_SESSION['id'];
               
			   
			   $query="select * from book_details where B_ID='$id' limit 1";
			   $result=@mysqli_query($con,$query);
			   
			   while($res=mysqli_fetch_array($result)){
				   $_SESSION['isbn']=$res['B_ISBN'];
				   $_SESSION['title']=$res['B_TITLE'];
				   $_SESSION['author']=$res['B_AUTHOR'];
				   $_SESSION['datepub']=$res['B_PUBLISHED'];
				   $_SESSION['shortsum']=$res['B_OTHER'];
				   $_SESSION['description']=$res['B_DESC'];
				   $_SESSION['price']=$res['B_PRICE'];
				   $_SESSION['genre']=$res['B_GENRE'];
				   $_SESSION['publisher']=$res['B_PUBLISHER'];
				   $_SESSION['quantity']=$res['B_QTY'];
			   $_SESSION['image']=$res['B_IMG'];
			   
               }
               
			   
			   
			   if(isset($_POST['save'])){
				   
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
				 
				
				  
				 
				 
				  $query="update `book_details` set B_ISBN='$isbn',B_TITLE='$title',B_GENRE='$genre',B_AUTHOR='$author',B_PUBLISHER='$publisher',B_DESC='$desc',B_PRICE='$price',B_QTY='$quantity',B_PUBLISHED='$bdo', B_OTHER='$summary' where B_ID='$id'";
				  @mysqli_query($con,$query);
				  
				  $getid="select B_ID from book_details where B_ISBN='$isbn' LIMIT 1";
                  $res=@mysqli_query($con,$getid);
                  $date = date('Y-m-d\TH:i:s.u');  
                  $activity = "EDIT Book with an ISBN#: " . $isbn;
                  $sql = "INSERT INTO log_history(log_date,  log_activity)";
                   
                    $sql .= " VALUES ('$date', '$activity')";
                    $result = query($sql);


                  


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
				  unset($_SESSION['error1']);
				  unset($_SESSION['exist1']);
					
				  
				  header('location:bookInfo.php');
				  
				}else{
					$_SESSION['error1']="The file type ". $filetype." is not supported";
					
				}
			
			   }
			   header('location:bookInfo.php');
			   }
			   
			   
			   
			   
			   
			   
			   ?>
<!doctype html>
    <html>
    <title>Book Information</title>
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
         var a = "<?php echo $_SESSION['isbn'];?>";
    document.getElementById("info").innerHTML = a;
         var b = "<?php echo $_SESSION['title'];?>";
    document.getElementById("info1").innerHTML = b;
          var c = "<?php echo $_SESSION['author'];?>";
    document.getElementById("info2").innerHTML = c;   
         var d = "<?php echo $_SESSION['datepub'];?>";
    document.getElementById("info3").innerHTML = d;
         var e = "<?php echo $_SESSION['shortsum'];?>";
    document.getElementById("info4").innerHTML = e;
         var f = "<?php echo $_SESSION['description'];?>";
    document.getElementById("info5").innerHTML = f;
         var g = d"<?php echo $_SESSION['price'];?>";
    document.getElementById("info6").innerHTML = g; 
		var i ="<?php echo $_SESSION['genre'];?>";
    document.getElementById("info7").innerHTML = i; 
	var j = "<?php echo $_SESSION['publisher'];?>";
    document.getElementById("info8").innerHTML = j; 
	var k = "<?php echo $_SESSION['quantity'];?>";
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
				
				
				
          <form method="POST" role="form" enctype="multipart/form-data" id="formfield" name="mainForm" action="bookInfo.php">

                      <div class="panel panel-warning col-sm-12"  >
                          
                    <?php 
                        if(isset($_SESSION['SuccessMsg']) && $_SESSION['SuccessMsg'] != ''){
                            echo $_SESSION['SuccessMsg'];
                            unset($_SESSION['SuccessMsg']);
                        }
                        else if(isset($_SESSION['SuccessMsg1']) && $_SESSION['SuccessMsg1'] != ''){
                            echo $_SESSION['SuccessMsg1'];
                            unset($_SESSION['SuccessMsg1']);
                        }?>
						
						
                      <center> <h1><b><?php echo $_SESSION['title']?></b></h1></center> 
              
                      <center><img src="<?php echo $_SESSION['image']?>" width="10%"></center>
                       
                                        
              <table width="100%" class="warning">
								
	                       <tr>
                                    <td><b>ISBN:</b> </td>  
                                    <td>
                                     <?php echo $_SESSION['isbn']?>
                                    </td>
                                </tr>
  
                                <tr>
                                    <td><b>Title:</b> </td>  
                                    <td>
                                        <?php echo $_SESSION['title']?> 
                                   </td>
                                </tr>
                                <tr>
                                    <td><b>Genre:</b> </td>  
                                    <td>
                                        <?php echo $_SESSION['genre']?> 
                                   </td>
                                </tr>
                                 <tr>
                                    <td><b>Author:</b> </td>  
                                    <td>
                                         <?php echo $_SESSION['author']?>
                                   </td>
                                </tr>  
                                <tr>
                                    <td><b> Publisher:</b> </td>  
                                    <td>
                                         <?php echo $_SESSION['publisher']?>
                                   </td>
                                </tr>                              
                                <tr>
                                    <td><b>Date Published:</b> </td>  
                                    <td>
                                         <?php echo $_SESSION['datepub']?>
                                    </td> 
                                </tr> 
                                
                                <tr>
                                 <td><b>Short Summary:</b>   </td>  
                                <td> 
                                         <?php echo $_SESSION['shortsum']?>
                                </td>
                                </tr>
                                 <tr>
                                 <td><b>Other Description:</b>   </td>  
                                <td> 
                                        <?php echo $_SESSION['description']?>
        
                                </td>
                                </tr>                               
                                
                                <tr>
                                  <td><b>Price:</b>  </td>  
                                    <td>
                                    ‎₱<?php echo $_SESSION['price']?>
                                    </td>
                                </tr>
                                <tr>
                                  <td><b>Stock:</b>  
                                    <td>
                                         <?php echo $_SESSION['quantity']?>
                                    </td>
                                </tr>
                 </table>                                         
			      <center>
			          <div> <br> <br>
                                 <button type="button" class="btn btn-warning btn-lg"  name="edit" style="display:block;width:250px;" data-toggle="modal" data-target="#confirm-submit" >Edit</button><br>


                     </div>
      
                            </center>
                     	</div>
						
						<div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <font size="5"> <b>  Edit Book Details</b></font>
            </div>
            <div class="modal-body">
                Please enter the required values.
                <table class="table table-bordered">
                       <tr>
                                    <td><b>ISBN:</b>  </td>  
                                    <td>
                                     <input class="form-control" type="number" value="<?php echo $_SESSION['isbn'];?>" placeholder="ISBN" required="required" id="isbn" disabled/>  
                                     <input type="hidden" name="isbn" value="<?php echo $_SESSION['isbn'];?>">
                                    </td>
                                </tr>
  
                                <tr>
                                    <td><b>Title:</b> </td>  
                                    <td>
                                        <input class="form-control" type="text" name="btitle" value="<?php echo $_SESSION['title'];?>" placeholder="Book Title" required="required" id="btitle"/>
                                   </td>
                                </tr>
                                 <tr>
                                    <td><b>Author:</b> </td>  
                                    <td>
                                        <input class="form-control" type="text" name="author" value="<?php echo $_SESSION['author'];?>" placeholder="Author" required="required" id="author" />
                                   </td>
                                </tr>   
								<tr>
                                    <td><b>Genre:</b> </td>  
                                    <td>
										<select name="genre" id="genre" required>
                                        
										<option value="" disabled >Select Genre</option>
										<option value="Comedy" <?php if($_SESSION['genre']=="Comedy"){ echo "selected";}?>>Comedy</option>
										<option value="Drama" <?php if($_SESSION['genre']=="Drama"){ echo "selected";}?>>Drama</option>
										<option value="Fiction" <?php if($_SESSION['genre']=="Fiction"){ echo "selected";}?>>Fiction</option>
										<option value="History" <?php if($_SESSION['genre']=="History"){ echo "selected";}?>>History</option>
										<option value="Horror" <?php if($_SESSION['genre']=="Horror"){ echo "selected";}?>>Horror</option>
										<option value="Mystery" <?php if($_SESSION['genre']=="Mystery"){ echo "selected";}?>>Mystery</option>
										<option value="Psych" <?php if($_SESSION['genre']=="Psych"){ echo "selected";}?>>Psych</option>
										<option value="Romance" <?php if($_SESSION['genre']=="Romance"){ echo "selected";}?>>Romance</option>
										<option value="Science" <?php if($_SESSION['genre']=="Science"){ echo "selected";}?>>Science</option>
										</select>
								   </td>
                                </tr>
                                <tr>
								
                                    <td><b>Publisher:</b> </td>  
                                    <td>
                                        <input class="form-control" type="text" name="publisher" value="<?php echo $_SESSION['publisher'];?>" placeholder="Publisher" required="required" id="publisher"/>
                                   </td>
                                </tr> 
								
                                <tr>
                                    <td><b>Date Published:</b> </td>  
                                    <td>
                                        <input  name="bdo" type="date"  onChange="showAge()" id="bdo" value="<?php echo $_SESSION['datepub']?>"class="form-control" type="date" required="required" style="width:200px"/> 
                                    </div> 
                                    </td> 
                                </tr> 
                                
                                <tr>
                                 <td><b>Short Summary:</b>  </td>   
                                <td> 
                                    <textarea class="form-control" name="summary"   id="summary"   ><?php echo $_SESSION['shortsum'];?></textarea>
        
                                </td>
                                </tr>
                                 <tr>
                                 <td><b>Other Description:</b>   </td>  
                                <td> 
                                    <textarea class="form-control" name="desc"   id="desc"   ><?php echo $_SESSION['description'];?></textarea>
        
                                </td>
                                </tr>                               
                                
                                <tr>
                                  <td><b>Price</b>  </td>  
                                    <td>
                                     <input class="form-control" type="number" name="price" value="<?php echo $_SESSION['price'];?>" placeholder="0.00" required="required" id="price" style="width:100px" pattern="^\d*(\.\d{0,2})?$"/>  
                                    </td>
                                </tr>
								<tr>
                                  <td><b>Quantity</b>  </td>  
                                    <td>
                                     <input class="form-control" type="number" name="quantity" value="<?php echo $_SESSION['quantity'];?>" required="required" id="quantity" style="width:100px" pattern="^\d*(\.\d{0,2})?$"/>  
                                    </td>
                                </tr>
                                <tr>
                                    
                                    <td> <b>Upload Book Cover:</b></td>
                                    <td><input class=""  type="file" name="image" value="image" size="" style="width:200px" accept="image/x-png,image/jpeg" id="image" /></b></td>
									
                                </tr>

                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <button id="submit" value="submit" name="save" type="submit" class="btn btn-success success">Submit</button>
			
            </div>   
        </div>
						
						
						
						
						
						
                 </form>
                      
             </div>
              </div>
              </div>
                </div>
       
  
  </body>
    </html>

<?php

// Helper Functions  
function clean($string){
  return htmlentities($string);//display html to a normal text. Input: <b>HAHA</b> OUTPUT:<b>HAHA</b>  
}

function redirect($location){
  return header("Location: {$location}"); //redirect next page
}

function set_message($message){
  if (!empty($message)){
    $_SESSION['message'] = $message; 
  }else{
    $message = "";
  }

}

function display_message(){
  if(isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
  }
}

function validation_errors($error){
  
  $str = <<<HEREDOC
  <div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Warning! </strong> $error
  </div>
HEREDOC;
 return $str; //here doc po isplaying error

}

// Validation Functions
function validate_user_registration2(){

  $errors = []; //save all the error
  if($_SERVER['REQUEST_METHOD'] == "POST"){
      $birthday = clean($_POST['bdo']);
      $contact_number = clean($_POST['contactnum']);
      $password = clean($_POST['password1']);
      $confirm_password = clean($_POST['password2']);
      $first_name = clean($_POST["firstname"]);
      $last_name = clean($_POST["lastname"]);
      $email = clean($_POST["email"]);
      $type = "admin";
      if ($password !== $confirm_password){
        $errors[] = "Password mismatch";
      }
      if (email_exist($email)){
        $errors[] = "Sorry email is already taken";
      }
      if (!empty($errors)){ //use heredoc pag nalilito na pwede din yung concat nalang
        foreach ($errors as $error) { 
          echo validation_errors($error);
        }  
      }else{
//u_id, u_email, u_password, u_firstname, u_lastname, u_contactnum, u_address, u_birthday, u_type, 
        if(register_user($email, $password, $first_name, $last_name, $contact_number, $birthday, $type)){
          set_message('<div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Congratulations! </strong>'. $first_name . ' You have successfuly registered! Please check your email or spam folder.
          </div>');
          redirect("login.php");	
        }else{
        set_message('<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Sorry! </strong>We can\'t register the user.  
        </div>');
        redirect("login.php");	
        }
      }
    }
}
  
function email_exist($email){
  $sql = "SELECT u_id FROM usr_details WHERE u_email='$email' AND u_type = 'admin'";
  $result = query($sql);
  
  if (row_count($result) == 1){ //if meron nag equal to 1
    return true; 
  }else{
    return false;
  }
}

function register_user($email, $password, $first_name, $last_name, $contact_number, $birthday, $type){
  //u_id, u_email, u_password, u_firstname, u_lastname, u_contactnum, u_address, u_birthday, u_type
   $email = escape($email);
   $password = escape($password);
   $first_name = escape($first_name); 
   $last_name = escape($last_name);
   $contact_number = escape($contact_number);
   $birthday = escape($birthday);
   $type  = escape($type);
  
    if (email_exist($email)){
    return false;
    }else{
    $password = md5($password); // secured
    //u_id, u_email, u_password, u_firstname, u_lastname, u_contactnum, u_address, u_birthday, u_type
    $sql = "INSERT INTO usr_details(u_email, u_password, u_firstname, u_lastname, u_address,  u_birthdate,  u_type, u_valcode , u_activate, u_contactnum)";
    $sql .= " VALUES ('$email', '$password', '$first_name', '$last_name', ' ', '$birthday', '$type', ' ', 0, '$contact_number')";
    $result = query($sql);
    confirm($result); // confirm kung tama yung pag insert
    return true;
    }
}
// Validate Login User

function validate_user_login(){
 
  $errors = []; //save all the error

  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $email = clean($_POST['email']);
    $password = clean($_POST['password']);

         if(login_user($email, $password)){
            redirect ("addAdmin.php");
         }else{
          echo validation_errors("Wrong E-mail or Password"); 
         }
      
  }

} 
//User login function

function login_user($email, $password){
  //u_id, u_email, u_password, u_firstname, u_lastname, u_contactnum, u_address, u_birthday, u_type
    $sql = "SELECT u_password, u_id FROM usr_details WHERE u_email = '".escape($email)."' AND u_type = 'admin'";
    $result = query($sql);

    if(row_count($result) == 1){
        $row = fetch_array($result);
        $db_password = $row['u_password'];
        if(md5($password) == $db_password){
              $_SESSION['email'] = $email;
          return true; 
        }
    }
}
 

function password_exist($oldpassword){
  $email = $_SESSION['email'];
  $sql = "SELECT u_password FROM usr_details WHERE u_email='$email'";
  $result = query($sql);
  
  if(row_count($result) == 1){
    $row = fetch_array($result);
    $db_password = $row['u_password'];
    if(md5($oldpassword) == $db_password){
      return true; 
    }else{
      return false;
    }
}
}



//validate password 
function validate_password(){
 
  if(isset($_SESSION['changePass'])){
   $old_password = clean($_POST['oldpassword']);
   $email = $_SESSION['email'];
   $password = clean($_POST['password1']);
   $confirm_password = clean($_POST['password2']);

   $errors = []; //save all the error
 
   if (!password_exist($old_password) ){
     $errors[] = "Wrong password!";  
   }
   if ($password !== $confirm_password){
     $errors[] = "Password mismatch";
   }

   if (!empty($errors)){ //use heredoc pag nalilito na pwede din yung concat nalang
     foreach ($errors as $error) { 
       echo validation_errors($error);
     }  
   }else {
     new_password($email, $password);
     }
   }
}
 
 //new password
 function new_password($email, $password){
     
     $sql = "SELECT u_password FROM usr_details WHERE u_email='$email'";
     $result = query($sql); //query the statement
     confirm($result); //
     $password = md5($password); 
   
       if (row_count($result) == 1){ //Find if meron may equate sa 1
         set_message("<p class='bg-success'> You have successfully change your password </p>");
       
       $sql2 = "UPDATE usr_details SET u_password = '$password' WHERE u_email = '$email'";
       $result2 = query($sql2);
       confirm($result2);
       redirect("changepassword.php");
         // SQL STATEMENT
         // QUERY  -- DO
         // CONFIRM (OPTIONAL)
       }else{
         set_message("<p class='bg-warning'> <strong>Error! </strong>User </p>");
         redirect("changepassword.php");
       }
}

function logged_in(){
  if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    $sql = "SELECT u_type FROM usr_details WHERE u_email = '$email'";
    $result = query($sql);
    if(row_count($result) == 1){
      $row = fetch_array($result);
       $db_type = $row['u_type'];
       if ($db_type == 'admin'){
        return true; 
      }else{
        set_message('<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Sorry! </strong>You can\'t can\'t access this user.  
        </div>');
        return false;
      }
    }else{
      return false;
    }


  }

}
// checkers kung may laman ba yung mga view
function book_checker(){
  if(!isset($_SESSION['id'])){
    redirect("booklist.php"); 
  }
}
function user_checker(){
  if(!isset($_SESSION['id'])){
    redirect("userlist.php"); 
  }
}
function admin_checker(){
  if(!isset($_SESSION['id1'])){
    redirect("adminlist.php"); 
  }
}

//PDF MAKER
function pdf_maker(){
  if(isset($_POST['export'])){
    redirect("pdf.php"); 
  }

}


// CART NAMAN!!!


 
 
 
 







?>
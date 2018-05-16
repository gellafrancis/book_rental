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

function token_generator(){
  $token = $_SESSION['token'] = md5(uniqid(mt_rand(), true)); 
  // produce id, mt_rand() prove random, true more bigger 
  //uniqid - relative to system time yung first then not random after that
  // true - longer
  //md5 - random
  return $token;
}                                      

function send_email($email, $subject, $msg, $headers){
  return mail($email, $subject, $msg, $headers);	
}

// Validation Functions
    
function validation_errors($error){
  
      $str = <<<HEREDOC
      <div class="alert alert-warning alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Warning! </strong> $error
      </div>
HEREDOC;
     return $str; //here doc po isplaying error
  
}

function login_success($first_name){
  
  $str = <<<HEREDOC
  <div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Congratulations! </strong> $first_name You have successfuly registered!
  </div>
HEREDOC;
 return $str;

}
function validate_user_registration1(){
  $min = 3;
  $max = 20;
  $errors = []; //save all the error

  if($_SERVER['REQUEST_METHOD'] == "POST"){
      $first_name = clean($_POST['first_name']);
      $last_name = clean($_POST['last_name']);
      $email = clean($_POST['email']);

      if (strlen($first_name) < $min ){
        $errors[] = "Your First Name cannot be less than {$min} characters";  
      }
      if (strlen($first_name) > $max ){
        $errors[] = "Your Last Name cannot be greater than {$max} characters";  
      }
      if (strlen($last_name) < $min ){
        $errors[] = "Your Last Name cannot be less than {$min} characters";  
      }
      if (strlen($last_name) > $max ){
        $errors[] = "Your Last Name cannot be greater than {$max} characters";  
      }
      if (strlen($email) < 10  ){
        $errors[] = "Your email cannot be less than 10 characters";  
      }
      if (email_exist($email)){
        $errors[] = "Sorry email is already taken";
      }
      if (!empty($errors)){ //use heredoc pag nalilito na pwede din yung concat nalang
          foreach ($errors as $error) { 
            echo validation_errors($error); 
          }
      }else{
        $_SESSION["first_name"] = $_POST["first_name"];
        $_SESSION["Lastname"] = $_POST["last_name"];
        $_SESSION["email"] = $_POST["email"];
        header('Location: registration_pt2.php');
      }
  }
}
function validate_user_registration2(){
    $min = 3;
    $max = 20;
    $errors = []; //save all the error

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $birthday = clean($_POST['bday']);
        $contact_number = clean($_POST['contactnum']);
        $address = clean($_POST['address']);
        $password = clean($_POST['password1']);
        $confirm_password = clean($_POST['password2']);
        $first_name = $_SESSION["first_name"];
        $last_name = $_SESSION["Lastname"];
        $email = $_SESSION["email"];
        $type = "user";

      if (strlen($password) < $min  ){
        $errors[] = "Your password cannot be less than {$min} characters";  
      }
      if (strlen($password) > $max  ){
        $errors[] = "Your password cannot be greater than {$max} characters";  
      }
      if ($password !== $confirm_password){
        $errors[] = "Password mismatch";
      }
      if (!empty($errors)){ //use heredoc pag nalilito na pwede din yung concat nalang
        foreach ($errors as $error) { 
          echo validation_errors($error);
        }  
      }else{
//u_id, u_email, u_password, u_firstname, u_lastname, u_contactnum, u_address, u_birthday, u_type, 
        if(register_user($email, $password, $first_name, $last_name, $contact_number, $address, $birthday, $type)){
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
  $sql = "SELECT u_id FROM usr_details WHERE u_email='$email' AND u_activate = 1";
  $result = query($sql);
  
  if (row_count($result) == 1){ //if meron nag equal to 1
    return true; 
  }else{
    return false;
  }
}

 // Register Functions

function register_user($email, $password, $first_name, $last_name, $contact_number, $address, $birthday, $type){
  //u_id, u_email, u_password, u_firstname, u_lastname, u_contactnum, u_address, u_birthday, u_type
   $email = escape($email);
   $password = escape($password);
   $first_name = escape($first_name); 
   $last_name = escape($last_name);
   $contact_number = escape($contact_number);
   $address  = escape($address);
   $birthday = escape($birthday);
   $type  = escape($type);
  
    if (email_exist($email)){
    return false;
    }else{
    $password = md5($password); // secured
    $validation_code = md5($email . microtime()); // concat pag wala may error 
    //u_id, u_email, u_password, u_firstname, u_lastname, u_contactnum, u_address, u_birthday, u_type
    $sql = "INSERT INTO usr_details(u_email, u_password, u_firstname, u_lastname, u_contactnum, u_address, u_birthdate, u_type, u_valcode , u_activate)";
    $sql .= " VALUES ('$email', '$password', '$first_name', '$last_name', '$contact_number', '$address', '$birthday', '$type', '$validation_code', 0)";
    $result = query($sql);
    confirm($result); // confirm kung tama yung pag insert


    $subject = "Activate Account";
    $msg = "Please click the link below to activate your Account 
    http://localhost/Book_Rental/user/activate.php?email=$email&code=$validation_code";
    $headers = "From: norreply@bookrental.com";
    send_email($email, $subject, $msg, $headers);

    return true;
    }
}
// Activate User
function activate_user() {
  if($_SERVER['REQUEST_METHOD'] == "GET"){
    if(isset($_GET['email'])){
      $email = clean($_GET['email']);
      $validation_code = clean($_GET['code']);

      
      $sql = "SELECT u_id FROM usr_details WHERE u_email = '".escape($_GET['email'])."' AND u_valcode  = '".escape($_GET['code'])."'  ";
      $result = query($sql); //query the statement
      confirm($result); // 

      if (row_count($result) == 1){ //Find if meron may equate sa 1
        set_message("<p class='bg-success'> You account has been activated. Please login </p>");
      
      $sql2 = "UPDATE usr_details SET u_activate = 1, u_valcode = 0 WHERE u_email = '".escape($email)."' AND u_valcode = '".escape($validation_code)."' ";
      $result2 = query($sql2);
      confirm($result2);
      redirect("login.php");
        // SQL STATEMENT
        // QUERY  -- DO
        // CONFIRM (OPTIONAL)
      }else{
        set_message("<p class='bg-warning'> <strong>Error! </strong>User </p>");
        redirect("login.php");
      }
    }
  }
}

// Validate Login User

function validate_user_login(){
  $min = 3;
  $max = 20;
  $errors = []; //save all the error

  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $email = clean($_POST['email']);
    $password = clean($_POST['password']);

         if(login_user($email, $password)){
            redirect ("index.php");
         }else{
          echo validation_errors("Wrong Input or Inactive account"); 
         }
      
  }

} 
//User login function

function login_user($email, $password){
  //u_id, u_email, u_password, u_firstname, u_lastname, u_contactnum, u_address, u_birthday, u_type
    $sql = "SELECT u_password, u_id FROM usr_details WHERE u_email = '".escape($email)."' AND u_activate = 1";
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


//forgot password
function recover_password(){
  if($_SERVER['REQUEST_METHOD'] == "POST"){

        $email = clean($_POST['email']);
        $validation_code = md5($email);
        if (email_exist($email)){

          $sql = "UPDATE usr_details SET  u_valcode = '".escape($validation_code)."' WHERE u_email = '".escape($email)."' ";
          $result = query($sql);
          confirm($result);
        $subject = "Reset Password";
        $msg = "Please click the link below to reset your password.
        http://localhost/Book_Rental/user/newpassword.php?email=$email&code=$validation_code";
        $headers = "From: norreply@bookrental.com";
         
          set_message('<div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>'. $email . ' </strong> Please check your email or spam folder to reset your password.
          </div>');
          redirect("login.php"); 
        
        return true;
      }else{
        echo validation_errors("This email does not exist.");
      }
   
  }
}

//validate password 
function validate_password(){

 $min = 3; 
 $max = 20;

  if($_SERVER['REQUEST_METHOD'] == "POST"){
  $password = clean($_POST['password1']);
  $confirm_password = clean($_POST['password2']);
  $errors = []; //save all the error

  if (strlen($password) < $min  ){
    $errors[] = "Your password cannot be less than {$min} characters";  
   
  }
  if (strlen($password) > $max  ){
    $errors[] = "Your password cannot be greater than {$max} characters";  
    
  }
  if ($password !== $confirm_password){
    $errors[] = "Password mismatch";
    
  }
  if (!empty($errors)){ //use heredoc pag nalilito na pwede din yung concat nalang
    foreach ($errors as $error) { 
      echo validation_errors($error);
    }  
  }else {
    new_password();
    }
  }
}
//new password
function new_password(){
  if(isset($_GET['email'])){
    $email = clean($_GET['email']);
    $validation_code = clean($_GET['code']);
    $password = md5($password);
    
    
    $sql = "SELECT u_id FROM usr_details WHERE u_email = '".escape($_GET['email'])."' AND u_valcode  = '".escape($_GET['code'])."'  ";
    $result = query($sql); //query the statement
    confirm($result); // 
  
      if (row_count($result) == 1){ //Find if meron may equate sa 1
        set_message("<p class='bg-success'> You have successfully change your password </p>");
      
      $sql2 = "UPDATE usr_details SET u_password = '".escape($password)."', u_valcode = 0 WHERE u_email = '".escape($email)."' AND u_valcode = '".escape($validation_code)."' ";
      $result2 = query($sql2);
      confirm($result2);
      redirect("login.php");
        // SQL STATEMENT
        // QUERY  -- DO
        // CONFIRM (OPTIONAL)
      }else{
        set_message("<p class='bg-warning'> <strong>Error! </strong>User </p>");
        redirect("login.php");
      }
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
       if ($db_type == 'user'){
        return true; 
      }else{
        set_message('<div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Sorry! </strong>Please logout first before you access as a user.  
        </div>');
        return false;
      }
    }else{
      return false;
    }


  }

}

function input_search(){
  if($_SERVER['REQUEST_METHOD'] == "GET"){
      $keyword = clean($_GET['search']);
      if (isset($keyword)){
        echo $keyword;
      }
  }
}
  

?>
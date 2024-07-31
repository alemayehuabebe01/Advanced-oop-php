<?php 

include_once("config/app.php");


include_once("controllers/RegisterController.php");
include_once("controllers/loginController.php");


$auth = new loginController();


// this for lougout function
if(isset($_POST['logout_btn'])){
  $checkedLogout = $auth->logout();
  if($checkedLogout){
    redirect("Logged out Successfuly", "login.php");
  }
}
//this for the login
 if(isset($_POST['login_btn'])){
   $email = validateInput($db_conn, $_POST['email']);
   $password = validateInput($db_conn, $_POST['password']);

   $chechLogin = $auth->userLogin($email,$password);
   if($chechLogin){

      if($_SESSION['auth_role'] == '1'){
        redirect("Logged In Successfuly", "backend/index.php");
      }else{
        redirect("Logged In Successfuly", "index.php");
      }
   
   }else{
    redirect("Invalid Eamil Id or password!","index.php");
   }
 }



//this for registration the user
if(isset($_POST['register_btn'])){
    $fname = validateInput($db_conn ,$_POST['fname']);
    $lname = validateInput($db_conn ,$_POST['lname']);
    $email = validateInput($db_conn ,$_POST['email']);
    $password = validateInput($db_conn ,$_POST['password']);
    $confirm_password = validateInput($db_conn ,$_POST['confirm_password']);


$register = new RegisterController();

$resultOfPassword = $register->confirmPassword($password, $confirm_password);

if($resultOfPassword){
   $result_user = $register->isUserExisted($email);
   if($result_user){
    redirect("Sorry The user Email Already Registerd", "register.php");
   }else{
     $register_sql = $register->registration($fname,$lname,$email,$password);
     if($register_sql){
          redirect("Registerd Successfuly", "login.php");
     }else{
        redirect("Something Went wrong try again", "register.php");
     }
    
   }
}else{
    redirect("Password and Confirm-Password Is Not Mach", "register.php");
}


}
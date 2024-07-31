<?php 

//include("config/app.php");
class RegisterController{
     private $conn;
    public function __construct(){
        $db = new DatabaseConnection();
        $this->conn = $db->getConnection();
    }

    public function registration($fname,$lname,$email,$password){

        $sql = "INSERT INTO users (fname,lname,email,password) VALUES ('$fname','$lname','$email','$password')";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function isUserExisted($email){
        $checkUser = "SELECT email FROM users WHERE email = '$email' LIMIT 1";
        $result = $this->conn->query($checkUser);
        if($result->num_rows > 0){
            return true;
        }else{
            return false;
        }
    }

    public function confirmPassword($password, $confirm_password){
        if($password == $confirm_password){
            return true;
        }else{
            return false;
        }
    }

}
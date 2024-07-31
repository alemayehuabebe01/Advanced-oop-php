<?php 

class AuthenticationController {
    private $conn;
    
    public function __construct(){
        $this->checkIsLoggedIn();
        $db = new DatabaseConnection();
        $this->conn = $db->getConnection();
    }

    private function checkIsLoggedIn(){
        if(!isset($_SESSION['authenticated'])){
           redirect("You have to Login first to access this page", "login.php");
           return false;
        }else{
            return true;
        }
    }

    public function authDetails(){

        $checkAuth = $this->checkIsLoggedIn();
        if($checkAuth)
        {
            $LogedUserId = $_SESSION['auth_user']['user_id'];
            $getLogedUserData = "SELECT * FROM users WHERE id = '$LogedUserId' LIMIT 1";
            $result = $this->conn->query($getLogedUserData);
            if($result->num_rows > 0){
                $data = $result->fetch_assoc();
                return $data;
 
            }else{
                redirect("Something Went wrong oop!!!", "login.php");
            }

        }else{

        }
    }

    public function admin(){
        $user_id = $_SESSION['auth_user']['user_id'];
        $checkAdmin = "SELECT id, role_as FROM users WHERE id='$user_id' AND role_as='1' LIMIT 1";
        $result = $this->conn->query($checkAdmin);
        if($result->num_rows == 1){
            return true;
        }else{
            redirect('you are not authorised as admin','index.php');
        }
    }


}



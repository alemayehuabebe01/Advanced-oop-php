<?php  
session_start();
define("DB_HOST", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "db_oop_practice");

include_once("DatabaseConnection.php");
$db_conn = new DatabaseConnection();
$db_conn = $db_conn->getConnection();



function redirect($message, $page){
    $_SESSION['message']  = "$message";
    header("Location:", $page);
    exit(0);
}

 function validateInput($db_conn, $input){
    return mysqli_escape_string($db_conn,$input);
 }
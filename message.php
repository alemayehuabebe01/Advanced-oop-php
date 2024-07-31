<?php  

if(isset($_SESSION['message'])){
    $message_content = $_SESSION['message'];
    echo ".'<h5>$message_content</h5>'.";
    unset($_SESSION['message']);

}
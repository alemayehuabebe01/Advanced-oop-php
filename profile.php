<?php  


include_once("includes/header.php");
include_once("config/app.php");
include_once("codes/authentication_code.php");

include_once("includes/nav.php");
$authenticated = new AuthenticationController();
$data = $authenticated ->authDetails();

?>

<div class="py-5">
    <div class="container">

    <h1>My Profile</h1>
    <hr>
    <h4> Full Name : <?php echo $data['fname'] ." ".$data['lname'] ?></h4>
    <h4>Email : <?php echo $data['email']  ?></h4>
    <h4>Created at : <?php echo date('d-m-Y',strtotime($data['email'] )) ?></h4>

    


       
    </div>



</div>

<?php  
include_once("includes/footer.php");
?>
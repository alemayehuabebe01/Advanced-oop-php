<?php  

include_once("config/app.php");
include_once("codes/authentication_code.php");
include_once("includes/header.php");
include_once("includes/nav.php");

?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
            <?php include('message.php') ?>
                 <div class="card">
                    
                    <div class="card-header">
                        <h1>Register</h1>
                    </div>
                    <div class="card-body">
                        <form action="register.php" method="post">
                        <div class="mb-3">
                            <label for="">Frist Name</label>
                            <input type="text" class="form-control" name="fname">
                        </div>

                        <div class="mb-3">
                            <label for="">Last Name</label>
                            <input type="text" class="form-control" name="lname">
                        </div>

                        <div class="mb-3">
                            <label for="">Email ID</label>
                            <input type="text" class="form-control" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>

                        <div class="mb-3">
                            <label for="">Confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password">
                        </div>
                        </div>

                        <div class="mb-3">
                            <button type="submit" name="register_btn" class="form-control btn btn-primary">Submit</button>
                        </div>
                        </form>
                        
                    </div>
                 </div>
            </div>
        </div>
    </div>



</div>

<?php  
include_once("includes/footer.php");
?>
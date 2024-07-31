<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="javascript:void(0)">Logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="javascript:void(0)">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="javascript:void(0)">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="javascript:void(0)">Contact Us</a>
        </li> 
      
            <?php if(isset($_SESSION['authenticated'])) :  ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $_SESSION['auth_user']['user_fname'] ." ".$_SESSION['auth_user']['user_lname']?>
            </a>
          </li>
          <li class="nav-item">
         
          <form class="nav-link" action="" method="POST">
            <button type="submit" name ="logout_btn">Logout</button>
          </form>
          
        </li>

         <?php else : ?>

        <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
     </li>

 <li class="nav-item">
<a class="nav-link" href="register.php">Register</a>
   </li>

   <?php endif; ?>
      </ul>
      <form class="d-flex">
        
      </form>
      
    </div>
  </div>
</nav> 
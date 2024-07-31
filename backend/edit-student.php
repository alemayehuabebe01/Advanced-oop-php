<?php 
include_once("../config/app.php");
include_once("../controllers/AuthenticationController.php");
include("include/header.php") ;
$authenticated = new AuthenticationController();
$authenticated ->admin();

include_once("controllers/StudentController.php");
?>
    <body class="nav-fixed">
       <?php include("include/nav.php") ?>
        

        <!--Side Nav-->
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sidenav shadow-right sidenav-light">
                    <div class="sidenav-menu">
                        <div class="nav accordion" id="accordionSidenav">
                            <a class="nav-link collapsed pt-4" href="index.html">
                                <div class="nav-link-icon"><i data-feather="activity"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"><div class="nav-link-icon"><i data-feather="layout"></i></div>
                                Student
                                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" data-parent="#accordionSidenav">
                                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavLayout">
                                    <a class="nav-link" href="all-post.html">New Student</a>
                                    <a class="nav-link" href="add-new.html">All Students</a>
                                </nav>
                            </div>

                            <a class="nav-link" href="categories.html" ><div class="nav-link-icon"><i data-feather="chevrons-up"></i></div>
                                Categories
                            </a>

                            <a class="nav-link" href="pages.html" ><div class="nav-link-icon"><i data-feather="book-open"></i></div>
                                Pages
                            </a>

                            <a class="nav-link" href="users.html" ><div class="nav-link-icon"><i data-feather="users"></i></div>
                                Users
                            </a>

                            <a class="nav-link" href="comments.html" ><div class="nav-link-icon"><i data-feather="package"></i></div>
                                Comments
                            </a>

                            <a class="nav-link" href="messages.html" ><div class="nav-link-icon"><i data-feather="mail"></i></div>
                                Messages
                            </a>

                            <a class="nav-link" href="profile.html" ><div class="nav-link-icon"><i data-feather="user"></i></div>
                                Profile
                            </a>
                        </div>
                    </div>

                    <div class="sidenav-footer">
                        <div class="sidenav-footer-content">
                            <div class="sidenav-footer-subtitle">Logged in as:</div>
                            <div class="sidenav-footer-title">Md. A. Barik</div>
                        </div>
                    </div>

                </nav>
            </div>


            <div id="layoutSidenav_content">
                <main>
                    <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
                        <div class="container-fluid">
                            <div class="page-header-content">
                                <h1 class="page-header-title">
                                    <div class="page-header-icon"><i data-feather="activity"></i></div>
                                    <span>Dashboard</span>
                                </h1>
                            </div>
                        </div>
                    </div>

                    <!--Table-->
                    <div class="container-fluid mt-n10">

                       <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <?php include("../message.php")  ?>
                               
                                <div class="card-header">
                                    <h4>Edit Student</h4>
                                </div>
                                <div class="card-body">
                                <?php 

                                    if(isset($_GET['id'])){
                                        $student_id = validateInput($db_conn, $_GET['id']);
                                        $student = new StudentController();
                                        $result = $student->edit($student_id);
                                        if($result)
                                        {
                                            ?>
                                     <form action="codes/student_code.php" method="POST">
                                        <input type="hidden" name="student_id" value="<?php echo $result['id'] ?>">
                                        <div class="mb-3">
                                            <label for="">Full Name</label>
                                            <input type="text" name="fullname" value="<?php echo $result['fullname'] ?>" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Email</label>
                                            <input type="text" name="email" value="<?php echo $result['email'] ?>"  class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Course</label>
                                            <input type="text" name="course" value="<?php echo $result['course'] ?>"  class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Phone Number</label>
                                            <input type="text" name="phone_no" value="<?php echo $result['phone_no'] ?>" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <button class="form-control btn btn-primary" name="update_student">Update</button>
                                        </div>

                                    </form>

                                            <?php

                                        }else{
                                            echo 'No Recored id found';
                                        }
                                        
                                    }else{
                                        echo 'Some thing Went Wrong try again';
                                    }

                                    ?>
                                    
                                </div>
                            </div>
                        </div>
                       </div>

                    </div>
                    <!--End Table-->

                </main>

               <?php include("include/footer.php") ?>
            </div>
        </div>

        <!--Script JS-->
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>

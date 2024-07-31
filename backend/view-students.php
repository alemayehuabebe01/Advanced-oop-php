<?php 
include_once("../config/app.php");
include_once("../controllers/AuthenticationController.php");
include("include/header.php") ;
include_once("controllers/StudentController.php");
$authenticated = new AuthenticationController();
$authenticated ->admin();
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
                                    <h4>View Student</h4>
                                </div>
                                <div class="card-body">
                                   <div class="table-responsive">
                                      <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>FullName</th>
                                                <th>Course</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                          <?php  
                                            $student = new StudentController();
                                            $result = $student->index();
                                            if($result){
                                                foreach($result as $row)
                                                {
                                            ?>
                                                <tr>
                                                    <td><?php echo $row['id'] ?></td>
                                                    <td><?php echo $row['fullname'] ?></td>
                                                    <td><?php echo $row['course'] ?></td>
                                                    <td><?php echo $row['phone_no'] ?></td>
                                                    <td><?php echo $row['email'] ?></td>

                                                    <td>
                                                        <a href="edit-student.php?id=<?php echo $row['id'] ?>" class="btn btn-success">Edit</a>
                                                    </td>

                                                    <td>
                                                        <form action="codes/student_code.php" method="post">

                                                        <button type="submit" name="deleteStudent" value="<?php echo $row['id'] ?>" class="btn btn-danger">Delete</button>

                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php
                                                }
                                            }else{
                                                echo "No Record Found";
                                            }
                                            ?>
                                           
                                        </tbody>
                                      </table>
                                   </div>
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

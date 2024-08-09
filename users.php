<?php
session_start();

require_once 'core/conn.php';
if (isset($_SESSION['usertype'])) {
    $utype = $_SESSION['usertype'];
    if ($utype == "2") {
        $sql = "SELECT * FROM usertype WHERE usertype = '2'";
        $res = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($res);
    }




    
    if(isset($_REQUEST['useradd'])){
        $username = $_REQUEST['username'];
        $employee_surname = $_REQUEST['employee_surname'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $employee_mobile = $_REQUEST['employee_mobile'];
        $usertype = $_REQUEST['usertype'];
        $employee_dateofbirth = $_REQUEST['employee_dateofbirth'];
        $hire_date = $_REQUEST['hire_date'];      
        $department_id = $_REQUEST['department_id'];            
        $status = $_REQUEST['status'];      

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO employee (username, employee_surname, email, password, employee_mobile, usertype, employee_dateofbirth, hire_date, department_id, status) 
        VALUES('$username', '$employee_surname', '$email', '$hashedPassword', '$employee_mobile', '$usertype', '$employee_dateofbirth', '$hire_date', '$department_id', '$status')";
        mysqli_query($conn, $sql);
        header("Location: user.php?sucess=User added");
        exit();
    }

    $pageTitle = "Dashboard";
    $description = "Welcome To Ma";
    $meta_keywords = "";


    include "includes/admin-head.php";
?>


    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class=" align-items-center justify-content-between mb-4 width:50%">

            <form  method="post">
                <div class="card custom-card">

                    <div class=card-body>
                        <div class="row gy-3">

                            <div class=col-xl-6>
                                <label for=blog-author class=form-label>User Name</label>
                                <input type=text class="form-control bg-light text-dark" name="username" id="username" >
                            </div>

                            <div class=col-xl-6>
                                <label for=blog-author class=form-label>Surname</label>
                                <input type=text class="form-control bg-light text-dark" name="employee_surname" id="employee_surname" >
                             
                            </div>
                            

                            <div class=col-xl-6>
                                <label for=blog-category class=form-label>Email</label>
                                <input type=text class="form-control bg-light text-dark" name="email" id="email">
                            
                            </div>
                            <div class=col-xl-6>
                                <label for=blog-category class=form-label>Password</label>
                                <input type="text" class="form-control bg-light text-dark" id="password" name="password">
                            </div>
                            <div class=col-xl-6>
                                <label for=blog-category class=form-label>Mobile</label>
                                <input type="text" class="form-control bg-light text-dark" id="employee_mobile" name="employee_mobile">
                            </div>
                            <div class=col-xl-6>
                                <label for=blog-title class=form-label>Usertype</label>
                                <select class=form-control data-trigger name="usertype" id="usertype">

                                <option value="">------Select------</option>
                                <option value="SuperAdmin">SuperAdmin</option>
                                <option value="Admin">Admin</option>
                                <option value="Employe">Employe</option>
                                </select>
                            
                            </div>
                            <div class=col-xl-6>
                                <label for=blog-title class=form-label>Date of Birth</label>
                                
                                <input type="date" class="form-control bg-light text-dark" id="employee_dateofbirth" name="employee_dateofbirth">
                            </div>
                            <div class=col-xl-6>
                                <label for=blog-title class=form-label>Hired date</label>
                                
                                <input type="date" class="form-control bg-light text-dark" id="hire_date" name="hire_date">
                            </div>
                            <div class=col-xl-6>
                                <label for=blog-title class=form-label>Department</label>
                                <select class=form-control data-trigger name="department_id" id="department_id">
                                <?php


                                    $sql = "SELECT * FROM department";
                                    $query = mysqli_query($conn, $sql);
                                    foreach ($query as $q) { ?>
                                        <option value="<?php echo $q['department_id'] ?>"><?php echo $q['department_name'] ?></option>
                                    <?php } ?>
                               
                                </select>
                               
                            </div>
                            <div class=col-xl-6>
                                <label for=blog-title class=form-label>Status</label>
                                <select class=form-control data-trigger name="status" id="status">

                                <option value="">------Select------</option>
                                <option value="1">Enable</option>
                                <option value="2">Desable</option>
                                </select>
                               
                            </div>
                        </div>
                    </div>
                </div>

                <div class=card-footer>
                    <div class="btn-list text-end">
                        <button name="useradd" id="useradd" class="btn btn-sm btn-primary">Add User</button>
                    </div>
                </div>
        </div>
        </form>
            
        </div>
    </div>
    <!-- End of Main Content -->
    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website </span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
x
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php


    include "includes/footer.php";
    ?>

<?php
} else {
    header("Location:index.php?error=UnAuthorized Access");
}


?>
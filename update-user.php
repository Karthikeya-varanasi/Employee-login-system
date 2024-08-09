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




    if(isset($_REQUEST['employee_id'])){
        $employee_id = $_REQUEST['employee_id'];
        $sql = "SELECT * FROM employee WHERE employee_id = $employee_id";
        $query = mysqli_query($conn, $sql);
    }
    
    
if(isset($_REQUEST['update'])){
    $username = $_REQUEST['username'];
    $employee_surname = $_REQUEST['employee_surname'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $employee_mobile = $_POST['employee_mobile'];
    $usertype = $_POST['usertype'];
    $employee_dateofbirth = $_POST['employee_dateofbirth'];
    $hire_date = $_POST['hire_date'];
    $department_id = $_POST['department_id'];
    $status = $_POST['status'];
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $sql = "UPDATE employee SET username = '$username', employee_surname = '$employee_surname', email = '$email', password = '$hashedPassword', employee_mobile ='$employee_mobile', usertype = '$usertype', employee_dateofbirth ='$employee_dateofbirth', hire_date = '$hire_date', department_id = '$department_id', status = '$status' WHERE employee_id = $employee_id";
    mysqli_query($conn, $sql);

    header("Location: list.php?info=Updated Sucessfully");
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
        <?php foreach($query as $q){ ?>
        <div class=" align-items-center justify-content-between mb-4 width:50%">

            <form  method="post">
                <div class="card custom-card">

                    <div class=card-body>
                        <div class="row gy-3">

                            <div class=col-xl-6>
                                <label for=blog-author class=form-label>User Name</label>
                                <input type=text class="form-control bg-light text-dark" name="username" id="username"  value="<?php echo $q['username']?>">
                            </div>

                            <div class=col-xl-6>
                                <label for=blog-author class=form-label>Surname</label>
                                <input type=text class="form-control bg-light text-dark" name="employee_surname" id="employee_surname"  value="<?php echo $q['employee_surname']?>">
                             
                            </div>
                            

                            <div class=col-xl-6>
                                <label for=blog-category class=form-label>Email</label>
                                <input type=text class="form-control bg-light text-dark" name="email" id="email" value="<?php echo $q['email']?>" >
                            
                            </div>
                            <div class=col-xl-6>
                                <label for=blog-category class=form-label>Password</label>
                                <input type="text" class="form-control bg-light text-dark" id="password" name="password" value="<?php echo $q['password']?>">
                            </div>
                            <div class=col-xl-6>
                                <label for=blog-category class=form-label>Mobile</label>
                                <input type="text" class="form-control bg-light text-dark" id="employee_mobile" name="employee_mobile" value="<?php echo $q['employee_mobile']?>">
                            </div>
                            <div class=col-xl-6>
                                <label for=blog-title class=form-label>Usertype</label>
                                <select class=form-control data-trigger name="usertype" id="usertype">
                                
                                <?php


                                $sql = "SELECT id,usertype FROM usertype";
                                $u_query = mysqli_query($conn, $sql);
                                foreach ($u_query as $u_q) { ?>
                                    <option value="<?php echo $u_q['usertype'] ?>" <?php if($u_q['usertype']==$q['usertype']) {echo "selected";} ?>><?php echo $u_q['usertype'] ?></option>
                                <?php } ?>
                               
                               
                                </select>
                            
                            </div>
                            <div class=col-xl-6>
                                <label for=blog-title class=form-label>Date of Birth</label>
                                
                                <input type="date" class="form-control bg-light text-dark" id="employee_dateofbirth" name="employee_dateofbirth"  value="<?php echo $q['employee_dateofbirth']?>">
                            </div>
                            <div class=col-xl-6>
                                <label for=blog-title class=form-label>Hired date</label>
                                
                                <input type="date" class="form-control bg-light text-dark" id="hire_date" name="hire_date"  value="<?php echo $q['hire_date']?>">
                            </div>
                            <div class=col-xl-6>
                                <label for=blog-title class=form-label>Department</label>
                                <select class=form-control data-trigger name="department_id" id="department_id">
                             
                                <?php


                                    $sql = "SELECT department_id,department_name FROM department";
                                    $d_query = mysqli_query($conn, $sql);
                                    foreach ($d_query as $d_q) { ?>
                                        <option value="<?php echo $d_q['department_id'] ?>"  <?php if($d_q['department_id']==$q['department_id']) {echo "selected";} ?>><?php echo $d_q['department_name'] ?></option>
                                    <?php } ?>
                               
                                </select>
                               
                            </div>
                            <div class=col-xl-6>
                                <label for=blog-title class=form-label>Status</label>
                                <select class=form-control data-trigger name="status" id="status">
                                <?php


                                    $sql = "SELECT userstatus_id,user_status FROM userstatus";
                                    $s_query = mysqli_query($conn, $sql);
                                    foreach ($s_query as $s_q) { ?>
                                        <option value="<?php echo $s_q['userstatus_id'] ?>"  <?php if($s_q['userstatus_id']==$q['status']) {echo "selected";} ?>><?php echo $s_q['user_status'] ?></option>
                                    <?php } ?>
                                
                                </select>
                               
                            </div>
                        </div>
                    </div>
                </div>

                <div class=card-footer>
                    <div class="btn-list text-end">
                        <button name="update" id="update" class="btn btn-sm btn-primary">update User</button>
                    </div>
                </div>
        </div>
        </form>
            
        <?php }?> 
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
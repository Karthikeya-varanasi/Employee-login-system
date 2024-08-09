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





    if (isset($_REQUEST['useradd'])) {
        $username = $_REQUEST['username'];
        $employee_surname = $_REQUEST['employee_surname'];
        $email = $_REQUEST['email'];
        $password = md5($_REQUEST['password']);
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
            <div style="overflow-x:scroll;height: 80vh;">
                <table>
                    <thead style="  table-layout: fixed; background:#264dbe; color:white;">
                        <tr>
                            <th>id</th>
                            <th>Status</th>
                            <th>username</th>

                            <th>Surname</th>
                            <th>Email</th>
                            <th>Number</th>
                            <th>Usertype</th>
                            <th>hire_date</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $employee_id = $_SESSION['employee_id'];
                        $sql = "SELECT * FROM employee  ORDER BY employee_id DESC";
                        $res = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($res)) {

                        ?>
                            <tr>
                                <td>DJ_00<?php echo $row['employee_id']; ?></td>
                                <td style="display: inline-flex; width:100%; justify-content:space-between">


                                    <?php
                                    if ($row['status'] == 1) {
                                        echo '<button class="btn btn-success btn-sm ml-2" type="button"  >Active</button>';
                                    } elseif ($row['status'] == 0){
                                        echo '<button class="btn btn-danger btn-sm ml-2"  type="button"  >Inactive</button>';
                                    } else{
                                        echo '<button class="btn btn-danger btn-sm ml-2"  type="button"  >Inactive</button>';
                                    } 
                                    ?>

                                </td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['employee_surname']; ?> </td>
                                <td><?php echo $row['email']; ?> </td>
                                <td><?php echo $row['employee_mobile']; ?></td>
                                <td><?php echo $row['usertype']; ?></td>
                                <td><?php echo $row['hire_date']; ?></td>
                                <td>
                                <a href="update-user.php?employee_id=<?php echo $row['employee_id']?>" >
                                <button class="btn btn-primary btn-sm ml-2" type="button"  id="edit-user" ><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                                </td>

                            </tr>
                        <?php ;
                        } ?>
                    </tbody>


                </table>
            </div>
        </div>


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
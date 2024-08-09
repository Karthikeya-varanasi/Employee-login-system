<?php
session_start();
date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)

require_once 'core/conn.php';
if (isset($_SESSION['usertype'])) {
    $utype = $_SESSION['usertype'];
    if ($utype == "2") {
        $sql = "SELECT * FROM usertype WHERE usertype = '2'";
        $res = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($res);
    }


    if (isset($_REQUEST['employee_id'])) {
        $employee_id = $_REQUEST['employee_id'];
        $sql = "SELECT * FROM employee WHERE employee_id = $employee_id";
        $query = mysqli_query($conn, $sql);
    }


    $pageTitle = "Dashboard";
    $description = "Welcome To Ma";
    $meta_keywords = "";

if(isset($_POST['in_submit'])){
    $edate = date('Y-m-d');
    $employee_id = $_SESSION['employee_id'];
    $username=$_SESSION['username'];
    $in_time = date('H:i:s');


    $sql = "INSERT INTO inout_time (Edate, employee_id, username, In_time) 
        VALUES('$edate', '$employee_id', '$username', '$in_time')";
        mysqli_query($conn, $sql);

        header("Location: dashboard.php?sucess=checkedin");
        exit();

}

if(isset($_POST['out_submit'])){
    $out_time = date('H:i:s');
    $edate = date('Y-m-d');
    $employee_id = $_SESSION['employee_id'];
    $sql = "UPDATE inout_time SET out_time = '$out_time' WHERE employee_id = '".$employee_id."' and Edate='".$edate."' ";
    mysqli_query($conn, $sql);

    header("Location: dashboard.php?info=Updated Sucessfully");
    exit();

}


    include "includes/head.php";
?>


    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class=" align-items-center justify-content-between mb-4 width:50%">
            <h1 class="h3 mb-0 text-gray-800">Hello Good Morning <br><b style="color:#006FD8; font-size:60px; text-transform:capitalize;">Mr. <?php echo $_SESSION['username']; ?> <i class="fa-solid fa-certificate"></i></b> </h1>
            <form method="POST" onsubmit="return confirm('Are you Sure?');">
            <input type='hidden' name='login_time_id ' value='<?php echo $row['login_time_id ']; ?>' />
            <input class="btn btn-primary "  type="text" hidden name="In_time" id="In_time">
            <?php 
            if($checkin_count>0){
                echo 'Checked In';
            }else{
                ?>
                <button type="submit" style="padding:15px; border-radius:none;" name="in_submit" class="btn btn-primary">Check In</button>

                <?php
            }
            ?>
            <?php
            if(is_null($checkin_row['out_time'])){
                ?>
                <!-- <input class="btn btn-primary "  type="text"  name="out_time" id="out_time"> -->
                <button type="submit" style="padding:15px; border-radius:none;" name="out_submit" class="btn btn-primary">Check Out</button>

                <?php

            }else{
                echo 'Checked out';
            }


            ?>

            
            

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
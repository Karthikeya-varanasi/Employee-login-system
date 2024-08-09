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


    $pageTitle = "Dashboard";
    $description = "Welcome To Ma";
    $meta_keywords = "";


    include "includes/head.php";
?>


    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class=" align-items-center justify-content-between mb-4 ">
            <h1 class="h3 mb-0 text-gray-800">Hello Good Morning <br><b style="color:#006FD8; font-size:60px; text-transform:capitalize;">Mr. <?php echo $_SESSION['username']; ?> <i class="fa-solid fa-certificate"></i></b> </h1>
            <?php
                
                $employee_id = $_SESSION['employee_id'];
                // $status = 1;
                 $sql = "SELECT * FROM employee WHERE employee_id = '$employee_id' ";
            $res = mysqli_query($con,$sql);
            while($row = mysqli_fetch_array($res)){

                ?>  
                <p><b>Employee ID :</b> DJ_00<?php echo $row['employee_id']?></p>
                    <p><b>Name :</b> <?php echo $row['username']?></p>
                    <p><b>surname :</b> <?php echo $row['employee_surname']?></p>
                    <p><b>Department :</b> <?php echo $row['department_id']?></p>
                    <p><b>Mobile :</b> +91 <?php echo $row['employee_mobile']?></p>
                    <p><b>Date of Birth:</b> <?php echo $row['employee_dateofbirth']?></p>
                    <p><b>Hire Date :</b> <?php echo $row['hire_date']?></p>
                    <p><b>Email-Id :</b> <?php echo $row['email']?></p>
                    <?php ;} ?>
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
}
else{
    header("Location:index.php?error=UnAuthorized Access");
}


?>

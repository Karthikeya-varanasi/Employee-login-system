<?php
session_start();

require_once 'core/conn.php';
if (isset($_SESSION['usertype'])) {
    $utype = $_SESSION['usertype'];
    if ($utype == "1") {
        $sql = "SELECT * FROM usertype WHERE usertype = '1'";
        $res = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($res);
    }




    $pageTitle = "Dashboard";
    $description = "Welcome To Ma";
    $meta_keywords = "";


    include "functions/logic.php";
    include "includes/admin-head.php";
?>


    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class=" align-items-center justify-content-between mb-4 ">

        <div class="row">
        
        <div class="col-xl-6">
        <div style="display:inline-flex;">
        <!-- <h2>TimeSheets</h2> -->
        <a class="btn btn-primary" href="timesheet.php" role="button">View Timesheets</a>
        </div>
              <div style="overflow-x:hidden;height: 500px;">
                
                <table>
                    <thead style="  table-layout: fixed; background:#264dbe; color:white;">
                        <tr>
                            <th>id</th>
                            
                            <th>Status</th>
                            <th>Date</th>
                            <th>username</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($q = mysqli_fetch_array($prodectsearch_result)) : ?>
                            <tr>
                                <td><?php echo $q['timesheet_id']; ?></td>
                                <td style="display: inline-flex; width:100%; justify-content:space-between">


                                    <?php
                                        if ($q['work_status'] == 1) {
                                            echo '<button class="btn btn-success btn-sm ml-2" type="button"  >Completed</button>';
                                        } elseif ($q['work_status'] == 2) {
                                            echo '<button class="btn btn-danger btn-sm ml-2"  type="button"  >Incomplete</button>';
                                        } else if ($q['work_status'] == 3){
                                            echo '<button class="btn btn-primary btn-sm ml-2" type="button"  >Pending...</button>';
                                        }
                                    ?>

                                </td>
                                <td><?php echo $q['date']; ?></td>
                                <td><?php echo $q['username']; ?></td>
                                

                            </tr>
                        <?php endwhile; ?>
                    </tbody>


                </table>
            </div>
        </div>
        <div class="col-xl-6">
        <h1 class="h3 mb-0 text-gray-800">Hello Good Morning <br><b style="color:#006FD8; font-size:60px; text-transform:capitalize;">Mr. <?php echo $_SESSION['username']; ?> <i class="fa-solid fa-certificate"></i></b> </h1>
            <?php
                
                $employee_id = $_SESSION['employee_id'];
                 $sql = "SELECT * FROM employee WHERE employee_id = '$employee_id'";
            $res = mysqli_query($con,$sql);
            while($row = mysqli_fetch_array($res)){

                ?>  <p><b>Employee ID :</b> 00<?php echo $row['employee_id']?></p>
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
            
        </div>
    </div>
    <!-- End of Main Content -->
    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2021</span>
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
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



    if (isset($_REQUEST['tstatus_submit'])) {
        $timesheet_id = $_REQUEST['timesheet_id'];
        $work_status = $_REQUEST['work_status'];


        $sql = "UPDATE timesheets SET work_status  = '$work_status' WHERE timesheet_id = $timesheet_id";
        mysqli_query($conn, $sql);
    }

    // if(isset($_REQUEST['timesheet'])){
    //     $todays_work = $_REQUEST['todays_work'];
    //     $username = $_REQUEST['username'];
    //     $assigned_by = $_REQUEST['assigned_by'];
    //     $work_status = $_REQUEST['work_status'];
    //     $reasons = $_REQUEST['reasons'];      
    //     $sql = "INSERT INTO timesheets (todays_work, username,  assigned_by,  work_status, reasons) VALUES('$todays_work', '$username', '$assigned_by', '$work_status', '$reasons')";
    //     mysqli_query($conn, $sql);
    //     header("Location: timesheets.php?sucess=Blog Post Sucessfully added");
    //     exit();
    // }



    $pageTitle = "Time Sheets | Dinjit";
    $description = "Welcome To Ma";
    $meta_keywords = "";


    include "includes/head.php";
?>



    <div class="container-fluid">
        <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12 px-0" style="padding: 0px;">
            <h1>Time Sheet</h1>


            <form method="post" action="functions/logic.php">
                <div class="card custom-card">

                    <div class=card-body>
                        <div class="row gy-3">

                            <div class=col-xl-6>
                                <label for=blog-author class=form-label>User Name</label>
                                <input type=text class="form-control bg-light text-dark" name="username" id="username" value="<?php echo $_SESSION['username']; ?>">
                            </div>
                            <div class=col-xl-6>
                                <label for=blog-author class=form-label>Employee_id</label>
                                <input type=text class="form-control bg-light text-dark" name="employee_id" id="employee_id" value="DJ_00<?php echo $_SESSION['employee_id']; ?>">
                            </div>
                            <div class=col-xl-6>
                                <label for=blog-author class=form-label>Check In</label>
                                <input type=time class="form-control bg-light text-dark" name="check_in" id="check_in" >
                            </div>
                            <div class=col-xl-6>
                                <label for=blog-author class=form-label>Check Out</label>
                                <input type=time class="form-control bg-light text-dark" name="check_out" id="check_out" >
                            </div>
                            
                            <div class="col-xl-12">
                            <label for=blog-author class=form-label>Time Sheet Discription</label>
                                <textarea name="todays_work" id="todays_work" class="form-control bg-dark text-light   py-3 text-left" style="height: 250px;"></textarea>
                            </div>
                            <div class=col-xl-6>
                                <label for=blog-category class=form-label>Assigned By</label>
                                <select class=form-control data-trigger name="assigned_by" id="assigned_by">
                                    <option value="">------Select------</option>
                                    <?php
                                    $sql = "SELECT * FROM assignedby";
                                    $query = mysqli_query($conn, $sql);
                                    foreach ($query as $q) { ?>
                                        <option value="<?php echo $q['assignedby-nam'] ?>"><?php echo $q['assignedby-nam'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class=col-xl-6>
                                <label for=blog-category class=form-label>Work Status</label>
                                <select class=form-control data-trigger name="work_status" id="work_status">
                                    <option value="">------Select------</option>
                                    <?php
                                    $sql = "SELECT * FROM work_status";
                                    $query = mysqli_query($conn, $sql);
                                    foreach ($query as $q) { ?>
                                        <option value="<?php echo $q['work_status_id'] ?>"><?php echo $q['work_status_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class=col-xl-6>
                                <label for=blog-title class=form-label>Reason</label>
                                <input type=text class="form-control bg-light text-dark" id="reasons" name="reasons">
                            </div>
                        </div>
                    </div>
                </div>
                <div class=card-footer>
                    <div class="btn-list text-end">
                        <button name="timesheet" id="timesheet" class="btn btn-sm btn-primary">Submit</button>
                    </div>
                </div>
        </div>
        </form>

        <div style="overflow-x:scroll;height: 200px;">
        <table>
            <thead style="  table-layout: fixed; background:#264dbe; color:white;">
                <tr>
                    <th>id</th>
                    <th>Status</th>
                    <th>Date</th>
                    
                    <th>Log In</th>
                    <th>LogOut</th>
                    <th>Assigned By</th>
                    <th>Assignment</th>
                    <th>Update</th>
                </tr>
            </thead>
            <tbody>
            <?php
                
                $employee_id = $_SESSION['employee_id'];
                 $sql = "SELECT * FROM timesheets WHERE employee_id = '$employee_id' ORDER BY timesheet_id DESC";
            $res = mysqli_query($con,$sql);
            while($row = mysqli_fetch_array($res)){

                ?>
                <tr>
                    <td><?php echo $row['timesheet_id'];?></td>
                    <td style="display: inline-flex; width:100%; justify-content:space-between">


                                    <?php
                                        if ($row['work_status'] == 1) {
                                            echo '<button class="btn btn-success btn-sm ml-2" type="button"  >Completed</button>';
                                        } elseif ($row['work_status'] == 2) {
                                            echo '<button class="btn btn-danger btn-sm ml-2"  type="button"  >Incomplete</button>';
                                        } else if ($row['work_status'] == 3){
                                            echo '<button class="btn btn-primary btn-sm ml-2" type="button"  >Pending...</button>';
                                        }
                                    ?>

                                </td>
                    <td><?php echo $row['date'];?></td>
                    <td><?php echo $row['check_in'];?> AM</td>
                    <td><?php echo $row['check_out'];?> PM</td>
                    <td><?php echo $row['assigned_by'];?></td>
                    <td><?php echo $row['todays_work'];?></td>
                    <td>
                    <form action="#" method="POST">
                                        <select name='work_status' required='required'>
                                            <option value=''>Select</option>
                                            <option value='1'>Completed</option>
                                            <option value='2'>Incomplete</option>
                                            <option value='3'>Pending...</option>
                                        </select>
                                        <input type='hidden' name='timesheet_id' value='<?php echo $row['timesheet_id']; ?>' />
                                        <button type="submit" style="padding:3px 13px;" name="tstatus_submit" class="btn btn-primary"><i class="fa-solid fa-pen-nib"></i></button>
                                    </form>

                    </td>
                    
                </tr>
                <?php ;} ?>
            </tbody>


        </table>
        </div>

    </div>

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





    </div>



    </div>
    </div>


    </div>

    </div>






    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php


    include "includes/footer.php";
    ?>


    <script>
        ClassicEditor
            .create(document.querySelector('#todays_work'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>

<?php
} else {
    header("Location:index.php?error=UnAuthorized Access");
}


if (!isset($_SESSION['username'])) {
    echo "<script> alert('Invalid access');
             window.location.href = 'index.php';  </script>";
    exit;
}
?>
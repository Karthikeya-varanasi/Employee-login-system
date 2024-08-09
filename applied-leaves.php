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



    if (isset($_REQUEST['status_submit'])) {
        $Leaved_id = $_REQUEST['Leaved_id'];
        $leave_status = $_REQUEST['leave_status'];


        $sql = "UPDATE leaves SET leave_status  = '$leave_status' WHERE Leaved_id = $Leaved_id";
        mysqli_query($conn, $sql);
    }


    $pageTitle = "Time Sheets | Dinjit";
    $description = "Welcome To Ma";
    $meta_keywords = "";

    include "functions/logic.php";
    include "includes/admin-head.php";
?>



    <div class="container-fluid">
        <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12 px-3">
            <div style="display:inline-flex; width:100%; justify-content:space-between; padding:10px">
                <h1 style="font-size:26px;text-transform:uppercase;"><b>Leaves List</b></h1>

                <form action="" method="POST" style="display:inline-flex; gap:10px">
                    <input type="search" name="valueToSearch" class="form-control  bg-light text-dark " id="serch_bar" placeholder="Value To Search">
                    <button type="submit" name="leavesearch" class="btn btn-primary" value="Filter">Search</button>
                </form>
            </div>

            <div style="overflow-x:scroll;height: 70vh;">
                <table>
                    <thead style="  table-layout: fixed; background:#264dbe; color:white;">
                        <tr>
                            <th>id</th>
                            <th>status</th>
                            <th>username</th>
                            <th>Department</th>
                            <th>Type</th>
                            <th>Reason</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            

                            <th>Change</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($q = mysqli_fetch_array($leavesearch_result)) : ?>
                            <tr>
                                <td><?php echo $q['Leaved_id']; ?></td>
                                <td style=" display: inline-flex; width:100%; justify-content:space-between">


                                    <?php
                                    if ($q['leave_status'] == 2) {
                                        echo '<button class="btn btn-success btn-sm ml-2" type="button"  >Approved</button>';
                                    } elseif ($q['leave_status'] == 3) {
                                        echo '<button class="btn btn-danger btn-sm ml-2" type="button"  >Rejected</button>';
                                    } elseif ($q['leave_status'] == 1) {
                                        echo '<button class="btn btn-primary btn-sm ml-2" type="button"  >Pending...</button>';
                                    }
                                    ?>

                                </td>
                                <td><?php echo $q['username']; ?></td>
                                <td><?php echo $q['department_id']; ?></td>
                                <td><?php echo $q['leave_type']; ?> </td>
                                <td><?php echo $q['leave_reason']; ?></td>
                                <td><?php echo $q['lstart_date']; ?></td>
                                <td><?php echo $q['end_date']; ?></td>

                                <td>





                                    <form action="#" method="POST">
                                        <select name='leave_status' required='required'>
                                            <option value=''>Select</option>
                                            <option value='2'>Approved</option>
                                            <option value='1'>Pending</option>

                                            <option value='3'>Rejected</option>
                                        </select>
                                        <input type='hidden' name='Leaved_id' value='<?php echo $q['Leaved_id']; ?>' />
                                        <button type="submit" style="padding:3px 13px;" name="status_submit" class="btn btn-primary"><i class="fa-solid fa-pen-nib"></i></button>
                                    </form>

                                </td>

                            </tr>
                        <?php endwhile; ?>
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
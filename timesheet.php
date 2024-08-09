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



    $pageTitle = "Time Sheets | Dinjit";
    $description = "Welcome To Ma";
    $meta_keywords = "";

    include "functions/logic.php";
    include "includes/admin-head.php";
?>



    <div class="container-fluid">
        <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12 px-3">
            <div style="display:inline-flex; width:100%; justify-content:space-between; padding:10px">
                <h1 style="font-size:26px;text-transform:uppercase;"><b>All Time Sheet</b></h1>

                <form action="" method="POST" style="display:inline-flex; gap:10px">
                    <input type="search" name="valueToSearch" class="form-control  bg-light text-dark " id="serch_bar" placeholder="Value To Search">
                    <button type="submit" name="Prodectsearch" class="btn btn-primary" value="Filter">Search</button>
                </form>
            </div>

            <div style="overflow-x:scroll;height: 70vh">
                <table>
                    <thead style="  table-layout: fixed; background:#264dbe; color:white;">
                        <tr>
                            <th>id</th>
                            
                            <th>Status</th>
                            <th>Date</th>
                            <th>username</th>
                            <th>Log In (AM)</th>
                            <th>LogOut (PM)</th>
                            <th>Assigned By</th>
                            <th>Assignment</th>
                            <th>Remark</th>
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
                                <td><?php echo $q['check_in']; ?></td>
                                <td><?php echo $q['check_out']; ?></td>
                                <td><?php echo $q['assigned_by']; ?></td>
                                <td><?php echo $q['todays_work']; ?></td>
                                
                                <td><?php echo $q['reasons']; ?></td>
                                

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
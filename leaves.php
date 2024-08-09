<?php
session_start();

require_once 'core/conn.php';
if (isset($_SESSION['usertype'])) {
    $utype = $_SESSION['usertype'];
    if ($utype == "1") {
        $sql = "SELECT * FROM usertype WHERE usertype = '2'";
        $res = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($res);
    }




    if (isset($_REQUEST['delete'])) {
        $Leaved_id = $_REQUEST['Leaved_id'];

        $sql = "DELETE FROM leaves WHERE Leaved_id = $Leaved_id";
        $query = mysqli_query($conn, $sql);

        header("Location: leaves.php?sucess= Leave Request Deleted sucessfully");
        exit();
    }




    $pageTitle = "Time Sheets | Dinjit";
    $description = "Welcome To Ma";
    $meta_keywords = "";


    include "includes/head.php";
?>



    <div class="container-fluid">
        <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12 px-0" style="padding:0px;">

            <h1>Leaves</h1>

            <form method="post" action="functions/logic.php">
                <div class="card custom-card">

                    <div class=card-body>
                        <div class="row gy-3">

                            <div class=col-xl-6>
                                <label for=blog-author class=form-label>User Name</label>
                                <input type=text class="form-control bg-light text-dark" name="username" id="username" value="<?php echo $_SESSION['username'] ?>">
                            </div>
                            <div class=col-xl-6>
                                <label for=blog-author class=form-label>User Name</label>
                                <input type=text class="form-control bg-light text-dark" name="employee_id" id="employee_id" value="<?php echo $_SESSION['employee_id'] ?>">
                            </div>
                            <div class=col-xl-6>
                                <label for=blog-category class=form-label>Department</label>
                                <select class=form-control data-trigger name="department_id" id="department_id" required>
                                    <option value="">------Select------</option>

                                    <?php


                                    $sql = "SELECT * FROM department";
                                    $query = mysqli_query($conn, $sql);
                                    foreach ($query as $q) { ?>
                                        <option value="<?php echo $q['department_id'] ?>"><?php echo $q['department_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>


                            <div class=col-xl-6>
                                <label for=blog-category class=form-label>Leave Type</label>
                                <select class=form-control data-trigger name="leave_type" id="leave_type" required>

                                    <option value="">------Select------</option>
                                    <option value="Leave">Leave</option>
                                    <option value="Half Day">Half Day</option>
                                    <option value="Present">Present</option>

                                </select>
                            </div>
                            <div class=col-xl-6>
                                <label for=blog-category class=form-label>Start Date</label>
                                <input type="date" class="form-control bg-light text-dark" id="lstart_date" name="lstart_date" required>
                            </div>
                            <div class=col-xl-6>
                                <label for=blog-category class=form-label>End Date</label>
                                <input type="date" class="form-control bg-light text-dark" id="end_date" name="end_date" required>
                            </div>
                            <div class=col-xl-6>
                                <label for=blog-title class=form-label>Reason</label>
                                <input type=text class="form-control bg-light text-dark" id="leave_reason" name="leave_reason">
                            </div>

                        </div>
                    </div>
                </div>

                <div class=card-footer>
                    <div class="btn-list text-end">
                        <button name="leave" id="leave" class="btn btn-sm btn-primary">Submit</button>
                    </div>
                </div>
        </div>
        </form>


        <div style="overflow-x:scroll;height: 200px;">
            <table>
                <thead style="  table-layout: fixed; background:#264dbe; color:white;">
                    <tr>
                        <th>id</th>
                        <th>Applied Date</th>
                        <th>username</th>
                        <th>Leave Type</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $employee_id = $_SESSION['employee_id'];
                    $sql = "SELECT * FROM leaves WHERE employee_id = '$employee_id' ORDER BY Leaved_id DESC";
                    $res = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($res)) {

                    ?>
                        <tr>

                            <td><?php echo $row['employee_id']; ?></td>
                            <td><?php echo substr($row['Currenttymstanp'], 0, 20); ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['leave_type']; ?></td>
                            <td><?php echo $row['lstart_date']; ?></td>
                            <td><?php echo $row['end_date']; ?></td>
                            <td style="display: inline-flex; width:100%; justify-content:space-between">


                                <?php
                                if ($row['leave_status'] == 2) {
                                    echo '<button class="btn btn-success btn-sm ml-2" type="button"  >Approved</button>';
                                } elseif ($row['leave_status'] == 3) {
                                    echo '<button class="btn btn-danger btn-sm ml-2" type="button"  >Rejected</button>';
                                } elseif ($row['leave_status'] == 1){
                                    echo '<button class="btn btn-primary btn-sm ml-2" type="button"  >Pending...</button>';
                                }
                                ?>
                                <form action="#" method="POST">
                                    <input type="text" hidden value='<?php echo $row['Leaved_id'] ?>' name="Leaved_id">
                                    <button onclick="myFunction()" class="btn btn-danger btn-sm ml-2" name="delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                </form>
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

    <script>
        function myFunction() {
            alert("Are you sure to delete this Leave Request");
        }
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
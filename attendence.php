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



    if(isset($_POST['attendencesearch']))
    {
        $valueToSearch = $_POST['valueToSearch'];
        // search in all table columns
        // using concat mysql function
        $query = "SELECT * FROM `inout_time` WHERE CONCAT(`login_time_id`, `Edate`, `username`, `employee_id`) LIKE '%".$valueToSearch."%'";
        $attendencesearch_result = filterTable($query);
        
    }else {
        $query = "SELECT * FROM `inout_time` ORDER BY login_time_id DESC";
        $attendencesearch_result = filterTable($query);
    }
    




    $pageTitle = "Time Sheets | Dinjit";
    $description = "Welcome To Ma";
    $meta_keywords = "";

    include "includes/admin-head.php";
?>



    <div class="container-fluid">
        <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12 px-3">
            <div style="display:inline-flex; width:100%; justify-content:space-between; padding:10px">
                <h1 style="font-size:26px;text-transform:uppercase;"><b>Attendence</b></h1>

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
                            <th>username</th>
                            <th>Employee_id</th>
                            <th>In Time</th>
                            <th>Out Time</th>
                            
                            <th>Date</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($q = mysqli_fetch_array($attendencesearch_result)) : ?>
                            <tr>
                                <td><?php echo $q['login_time_id']; ?></td>
                                <td><?php echo $q['username']; ?></td>
                                <td>DJ_00<?php echo $q['employee_id']; ?></td>
                                <td><?php echo $q['In_time']; ?> </td>
                                <td><?php echo $q['out_time']; ?></td>
                               
                                <td><?php echo $q['Edate']; ?></td>

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
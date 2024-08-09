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


    if(isset($_REQUEST['department'])){
        $department_id = $_REQUEST['department_id'];
        $department_name = $_REQUEST['department_name'];
        $sql = "INSERT INTO department (department_id, department_name) VALUES('$department_id', '$department_name')";
        mysqli_query($conn, $sql);
        header("Location: departments.php?sucess=Blog Post Sucessfully added");
        exit();
    }



    $pageTitle = "Time Sheets | Dinjit";
    $description = "Welcome To Ma";
    $meta_keywords = "";


    include "includes/admin-head.php";
?>



    <div class="container-fluid">
        <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12 px-3">
            <h1>Departments</h1>


            <form method="post" >
                <div class="card custom-card">

                    <div class=card-body>
                        <div class="row gy-3">
                            <h3>Create A Department</h3>
                            <div class=col-xl-6>
                                <label for=blog-author class=form-label>Department Id</label>
                                <input type=text class="form-control bg-light text-dark" name="department_id" id="department_id" >
                            </div>
                            <div class=col-xl-6>
                                <label for=blog-author class=form-label>Department Name</label>
                                <input type=text class="form-control bg-light text-dark" name="department_name" id="department_name" >
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class=card-footer>
                    <div class="btn-list text-end">
                        <button name="department" id="department" class="btn btn-sm btn-primary">Submit</button>
                    </div>
                </div>
        </div>
        </form>

        <div style="overflow-x:scroll;">
        <table>
            <thead style="  table-layout: fixed; background:#264dbe; color:white;">
                <tr>
                    <th>Department_id</th>
                    <th>Name</th>
                    
                </tr>
            </thead>
            <tbody>
            <?php
                
                $department_id = $_SESSION['department_id'];
                 $sql = "SELECT * FROM department ORDER BY department_id DESC";
            $res = mysqli_query($con,$sql);
            while($row = mysqli_fetch_array($res)){

                ?>
                <tr>
                    <td><?php echo $row['department_id'];?></td>
                    <td><?php echo $row['department_name'];?></td>
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
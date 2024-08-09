<?php

session_start();

require_once 'core/conn.php';
if (isset($_POST['email']) && isset($_POST['password'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM employee WHERE email = '$email'";
    $res = mysqli_query($con,$sql);



    if (mysqli_num_rows($res) === 1) {
        $row = mysqli_fetch_assoc($res);

if (password_verify($password, $row['password'])) {
   



    	if ($row['usertype'] == "SuperAdmin") {   	
       $_SESSION['usertype'] = $row['usertype'];
       $_SESSION['username'] = $row['username'];
       $_SESSION['employee_id'] = $row['employee_id'];  
    	header('Location: admin-dashboard.php');
    	}elseif ($row['usertype'] == "Admin") {
       $_SESSION['usertype'] = $row['usertype'];
       $_SESSION['username'] = $row['username'];  
       $_SESSION['employee_id'] = $row['employee_id'];  
    	header('Location: admin-dashboard.php');
        }elseif ($row['usertype'] == "Employe") {
            $_SESSION['usertype'] = $row['usertype'];
            $_SESSION['username'] = $row['username'];  
            $_SESSION['employee_id'] = $row['employee_id'];  
                header('Location: dashboard.php');
            }
    	else{
         header("Location:index.php?error=Invalid Login Details");
    	}
    }else{
        header("Location:index.php?error=Invalid Login Details");
    }
    }
    else{
           header("Location:index.php?error=Please Enter Email and Password");
    }   
}



$pageTitle = "Login-Page";
$description = "Welcome To Ma";
$meta_keywords = "";
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="<?php echo $meta_keywords; ?>">
    <meta name="description" content="<?php echo $description; ?>">
    <title><?php echo $pageTitle; ?> | Karthikeya Varanasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css" />

    <script src="https://kit.fontawesome.com/75891b3d0e.js" crossorigin="anonymous"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assets/js/demo/chart-area-demo.js"></script>
    <script src="assets/js/demo/chart-pie-demo.js"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</head>

<body style="height:100vh; background-color:#006FD8;">




    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5" id="mainlog">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Good Morning Team</h1>
                                    </div>
                                    <?php if (isset($_GET['error'])) { ?>
                                            <p class="error"><?php echo $_GET['error']; ?></p>
                                        <?php } ?>
                                        <?php if (isset($_GET['sucess'])) { ?>
                                            <p class="sucess"><?php echo $_GET['sucess']; ?></p>
                                        <?php } ?>
                                    <form method="post" class="user">
                                        
                                        <div class="form-group">
                                            <input id="email" type="email" name="email" class="form-control form-control-user" placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input id="password" name="password" type="password" class="form-control form-control-user" placeholder="Password">
                                        </div>
                                        

                                        <button type="submit" class="btn btn-primary btn-user btn-block">Sign In</button>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</body>

</html>



<?php

include "includes/footer.php";
?>
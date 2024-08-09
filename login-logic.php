<?php

session_start();
require_once 'core/conn.php';

if (isset($_POST['email']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$password = validate($_POST['password']);
    
	

	if (empty($email)) {
		header("Location: index.php?error=Email is required");
	    exit();
	}else if(empty($password)){
        header("Location: index.php?error=password is required");
	    exit();
	}else{

		// hashing the password
        // $pass = md5($pass);

        
		$sql = "SELECT * FROM employee WHERE email='$email'";
		$res = mysqli_query($conn, $sql);
		if (mysqli_num_rows($res) === 1) {
			$row = mysqli_fetch_assoc($res);

			$hashedPasswordFromDB = $row['password'];





            if ($row['usertype'] == "Super Admin" && $row['status']==1 && password_verify($password, $hashedPasswordFromDB)) {
                $_SESSION['usertype'] = $row['usertype'];
                $_SESSION['username'] = $row['username'];
            	$_SESSION['employee_id '] = $row['employee_id'];
            	header("Location: admin-dashboard.php?success=Your have successfully Logedin");
		        
            }elseif ($row['usertype'] == "Admin" && $row['status']==1 && password_verify($password, $hashedPasswordFromDB)){
                $_SESSION['usertype'] = $row['usertype'];
                $_SESSION['username'] = $row['username'];
            	$_SESSION['employee_id '] = $row['employee_id'];
            	header("Location: admin-dashboard.php?success=Your have successfully Logedin");
		        
            }elseif ($row['usertype'] == "Employe" && $row['status']==1 && password_verify($password, $hashedPasswordFromDB)){
                $_SESSION['usertype'] = $row['usertype'];
                $_SESSION['username'] = $row['username'];
            	$_SESSION['employee_id '] = $row['employee_id'];
            	header("Location:  dashboard.php?success=Your have successfully Logedin");
		        
            }
            else{
				header("Location: index.php?error=Incorect Username or password");
		        exit();
			}
		}else{
			header("Location: index.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}
<?php

session_start();
include "../core/conn.php";

    if(isset($_REQUEST['timesheet'])){
        $todays_work = $_REQUEST['todays_work'];
        $username = $_REQUEST['username'];
        $employee_id = $_REQUEST['employee_id'];
        $check_in = $_REQUEST['check_in'];
        $check_out = $_REQUEST['check_out'];
        $assigned_by = $_REQUEST['assigned_by'];
        $work_status = $_REQUEST['work_status'];
        $reasons = $_REQUEST['reasons'];      
        $sql = "INSERT INTO timesheets (todays_work, username, employee_id, check_in, check_out, assigned_by, work_status, reasons) VALUES('$todays_work', '$username', '$employee_id', '$check_in', '$check_out', '$assigned_by', '$work_status', '$reasons')";
        mysqli_query($conn, $sql);
        header("Location: ../timesheets.php?sucess=Time sheet Updated");
        exit();
    }


    if(isset($_REQUEST['leave'])){
        $department_id = $_REQUEST['department_id'];
        $username = $_REQUEST['username'];
        $employee_id = $_REQUEST['employee_id'];
        $leave_type = $_REQUEST['leave_type'];
        $lstart_date = $_REQUEST['lstart_date'];
        $end_date = $_REQUEST['end_date'];
        $leave_reason = $_REQUEST['leave_reason'];      
        $sql = "INSERT INTO leaves (department_id, username, employee_id, leave_type,  lstart_date, end_date, leave_reason) VALUES('$department_id', '$username', '$employee_id', '$leave_type', '$lstart_date', '$end_date', '$leave_reason')";
        mysqli_query($conn, $sql);
        header("Location: ../leaves.php?sucess=The Application is Submited");
        exit();
    }

    if(isset($_REQUEST['leave'])){
        $department_id = $_REQUEST['department_id'];
        $username = $_REQUEST['username'];
        $employee_id = $_REQUEST['employee_id'];
        $leave_type = $_REQUEST['leave_type'];
        $lstart_date = $_REQUEST['lstart_date'];
        $end_date = $_REQUEST['end_date'];
        $leave_reason = $_REQUEST['leave_reason'];      
        $sql = "INSERT INTO leaves (department_id, username, employee_id, leave_type,  lstart_date, end_date, leave_reason) VALUES('$department_id', '$username', '$employee_id', '$leave_type', '$lstart_date', '$end_date', '$leave_reason')";
        mysqli_query($conn, $sql);
        header("Location: ../leaves.php?sucess=The Application is Submited");
        exit();
    }

    if(isset($_REQUEST['checkout'])){
        $employee_id = $_REQUEST['employee_id'];
        $username = $_REQUEST['usx`ername'];
        $In_time = $_REQUEST['In_time'];
        $date = $_REQUEST['date'];  
        $sql = "INSERT INTO inout_time (employee_id, username, Edate, leave_reason) VALUES('$department_id', '$username','$date', '$In_time')";
        mysqli_query($conn, $sql);
        header("Location: ../leaves.php?sucess=The Application is Submited");
        exit();
    }
    
    if(isset($_POST['Prodectsearch']))
    {
        $valueToSearch = $_POST['valueToSearch'];
        // search in all table columns
        // using concat mysql function
        $query = "SELECT * FROM `timesheets` WHERE CONCAT(`timesheet_id`, `date`, `username`, `work_status`) LIKE '%".$valueToSearch."%'";
        $prodectsearch_result = filterTable($query);
        
    }else {
        $query = "SELECT * FROM `timesheets` ORDER BY timesheet_id DESC";
        $prodectsearch_result = filterTable($query);
    }
    
    if(isset($_POST['leavesearch']))
    {
        $valueToSearch = $_POST['valueToSearch'];
        // search in all table columns
        // using concat mysql function
        $query = "SELECT * FROM `leaves` WHERE CONCAT(`Leaved_id`, `username`, `department_id`) LIKE '%".$valueToSearch."%'";
        $leavesearch_result = filterTable($query);
        
    }else {
        $query = "SELECT * FROM `leaves` ORDER BY Leaved_id DESC";
        $leavesearch_result = filterTable($query);
    }


    



?>
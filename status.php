<?php
session_start();
require_once 'core/conn.php';

$Leaved_id=$_GET['Leaved_id'];
$leave_status=$_GET['leave_status'];

$q="update leaves set leave_status=$leave_status where Leaved_id=$Leaved_id";


mysqli_query($con,$q);

header('./admin-dashboard.php');



?>
<?php 
$server = "localhost"; 
$username = "root";
$password = "";
$db = "dinjitemployee";                    
$con = mysqli_connect($server,$username,$password,$db);
// $con = mysqli_connect($server, $username, $password, $db );
// if($con){
// echo "connected";
// }

// else{
// echo "no connection";
// }
 
ini_set("display_errors", "off");  // TODO
// $conn = mysqli_connect("localhost", "root", "", "hoverboards" );
$conn = mysqli_connect($server, $username, $password, $db );

if(!$conn){
    echo "<h3 class='container bg-dark  p-3 text-center text-warning rounded-lg mt-5'>Not able to establish Database Connection<h3>";
}


// function to connect and execute the query
function filterTable($query)
{
    global $con;
    // $connect = mysqli_connect("localhost", "root", "", "hoverboards");
    $filter_Result = mysqli_query($con, $query);
    return $filter_Result;
}


/*$conn = mysqli_connect("localhost", "root", "", "hoverboards" );

if(!$conn){
    echo "<h3 class='container bg-dark  p-3 text-center text-warning rounded-lg mt-5'>Not able to establish Database Connection<h3>";
}*/




?>

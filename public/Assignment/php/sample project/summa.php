<?php  


$ser = "localhost";
$username = "root";
$password = "";
$dbname = "users";

$con = new mysqli($ser,$username,$password,$dbname);

if($con->connect_error){
    die("connection failed".$con->connect_error);
}else{
    echo "connect successfully";
}

?>
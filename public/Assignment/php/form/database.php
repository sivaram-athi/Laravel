<?php  

$servername="localhost";
$username="root";
$password="";
$dbname = "students";

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    die("connection failed".$conn->connect_error);
}

$email =$_POST["email"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];


$sql = " INSERT INTO userList(email,firstname,lastname) VALUES ('$lastname','$email','$firstname' )";

$sql ="DELETE TABLE userList";

if($conn->query($sql) == TRUE){
    // echo "create successfully";
}else{
    // echo " failed".$conn->error;
}

?>
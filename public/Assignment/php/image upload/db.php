<?php

$server = "localhost";
$username ='root';
$password ='';
$dbname ="image";

$conn = new mysqli($server,$username,$password,$dbname);

if($conn->connect_error){
    // echo 'connected';
    die ($conn->connect_error);
}
?>
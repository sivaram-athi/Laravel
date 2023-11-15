<?php

$serve = "localhost";
$username = "root";
$password = "";
$dbname = "sivaram";

$conn = new mysqli($serve,$username,$password,$dbname);

if($conn->connect_error){
    // die("failed".$conn->connect_error);
}
// echo("connected");

$sql = "CREATE TABLE users(id int(20) unsigned auto_increment primary key,name varchar(50) not null,email varchar(50) not null,mobile varchar(10) not null)";

if($conn->query($sql) == TRUE){
    
}

?>
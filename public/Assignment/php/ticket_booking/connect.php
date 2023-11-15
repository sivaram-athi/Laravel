<?php ob_start(); ?>
<?php

session_start();
$server = "192.168.7.254";
$username ="athi_juntrdev_usr";
$password ='Yr540nP92TbTdK9p';
$dbname ="athi_juntrdev_db";
$port=42209;

$conn=new mysqli($server,$username,$password,$dbname,$port);

if($conn->connect_error){
    // die($conn->connect_error);
}

// $sql ="CREATE TABLE users(id int(10)unsigned auto_increment primary key,name varchar(50) not null, email varchar(50),password varchar(50) not null)";

// if($conn->query($sql)==true){
//     echo "success";
// }
// else{
//     $conn->connect_error;
// }

?>
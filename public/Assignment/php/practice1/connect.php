<?php ob_start(); ?>
<?php

$servername = "192.168.7.254";
$username = "athi_juntrdev_usr";
$password = "Yr540nP92TbTdK9p";
$dbname ="athi_juntrdev_db";
$port=42209;

$conn = new mysqli($servername, $username, $password,$dbname,$port);

if($conn->connect_error){
    // die("failed".$conn->connect_error);
}
// echo "connected";

?>
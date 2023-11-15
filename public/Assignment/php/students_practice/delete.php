<?php ob_start(); ?>
<?php
include("connect.php");

if (isset($_GET['del'])) {
$id = $_GET['del'];

// echo $id;

$sql ="DELETE from student_list_user where id='$id'";

if($conn->query($sql)==true){
    header("location:adminpage.php");
    // echo "dfsghdfhdfh";
}
else{
    echo $conn->error;
}
}

?>
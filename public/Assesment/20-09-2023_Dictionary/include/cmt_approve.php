<?php ob_start(); ?>
<?php
include("connect.php");

if (isset($_GET['aprv'])) {
$id = $_GET['aprv'];

// echo $id;

$sql ="UPDATE dictionary_comments SET status = 1 where comment_id='$id'";

if($conn->query($sql)==true){
    header("location:comments.php");
}
else{
    echo $conn->error;
}
}

?>
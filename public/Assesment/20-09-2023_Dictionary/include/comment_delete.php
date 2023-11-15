<?php ob_start(); ?>
<?php
include("connect.php");

if (isset($_GET['del'])) {
$id = $_GET['del'];

// echo $id;

$sql ="DELETE from dictionary_comments where comment_id='$id'";

if($conn->query($sql)==true){
    header("location:comments.php");
    // echo "dfsghdfhdfh";
}
else{
    echo $conn->error;
}
}

?>
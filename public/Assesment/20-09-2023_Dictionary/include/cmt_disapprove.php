<?php ob_start(); ?>
<?php
include("connect.php");

if (isset($_GET['disaprv'])) {
$id = $_GET['disaprv'];

// echo $id;

$sql ="UPDATE dictionary_comments SET status = 0 where comment_id='$id'";

if($conn->query($sql)==true){
    header("location:comments.php");
    // echo "dfsghdfhdfh";
}
else{
    echo $conn->error;
}
}

?>
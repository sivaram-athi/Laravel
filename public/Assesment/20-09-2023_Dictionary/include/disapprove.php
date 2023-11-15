<?php ob_start(); ?>
<?php
include("connect.php");

if (isset($_GET['disaprv'])) {
$id = $_GET['disaprv'];

// echo $id;

$sql ="UPDATE dictionary_words SET status = 0 where word_id='$id'";

if($conn->query($sql)==true){
    header("location:adminpage.php");
    // echo "dfsghdfhdfh";
}
else{
    echo $conn->error;
}
}

?>
<?php
include("connect.php");

if (isset($_GET['aprv'])) {
$id = $_GET['aprv'];

// echo $id;

$sql ="UPDATE dictionary_words SET status = 1 where word_id='$id'";

if($conn->query($sql)==true){
    header("location:adminpage.php");
    // echo "dfsghdfhdfh";
}
else{
    echo $conn->error;
}
}

?>
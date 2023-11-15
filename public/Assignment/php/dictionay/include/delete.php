<?php
include("connect.php");

if (isset($_GET['del'])) {
$id = $_GET['del'];

// echo $id;

$sql ="DELETE from dictionary_words where word_id='$id'";
$sql1 ="DELETE from dictionary_comments where word_id='$id'";

if($conn->query($sql)==true){
    header("location:adminpage.php");
    
}
else{
    echo $conn->error;
}

if($conn->query($sql1)==true){
    // header("location:adminpage.php");
}
}

?>
<?php ob_start(); ?>
<?php
include("connect.php");

if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $sql2 = "SELECT * FROM dictionary_words where word_id='$id'";
    $result1 = $conn->query($sql2);
    if ($result1->num_rows > 0) {
        $row = $result1->fetch_assoc();
        $image = $row['image'];
    }
    $sql = "DELETE from dictionary_words where word_id='$id'";
    $sql1 = "DELETE from dictionary_comments where word_id='$id'";
    $result = $conn->query($sql);
    if ($result) {
        unlink("assets/images/$image");
        header("location:adminpage.php");
    } else {
        echo $conn->error;
    }
    if ($conn->query($sql1) == true) {
    }
}

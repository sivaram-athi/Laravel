<?php ob_start(); ?>
<?php
include("connect.php");
?>
<?php


if (isset($_GET['del'])) {
    $id1 = $_GET['del'];
    $sql = "DELETE from crud_users where id =$id1";
    if ($conn->query($sql) == TRUE) {
        // echo "connected successfully";
        header('location:view.php');
    } else {
        echo "error";
    }
}

?>
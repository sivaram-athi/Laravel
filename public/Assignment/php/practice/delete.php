<?php 
include("db.php");
?>
<?php 


if(isset($_GET['del'])){
    $id1 =$_GET['del'];
    $sql = "DELETE from studentlist where id =$id1";
    if ($conn->query($sql) == TRUE) {
        echo "connected successfully";
        header('location:view.php');
    }
    else{
        echo "error";
    }
}

?>
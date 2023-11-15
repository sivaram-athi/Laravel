<?php ob_start(); ?>
<?php
include("connect.php");

$id = $_GET['id'];
$sesName = $_SESSION['name'];
$sesPass = $_SESSION['password'];
// echo $id;

$arr = '';

$sql = "SELECT * from shopping_cart_users where name ='$sesName' && password='$sesPass'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row['product'] !='null') {
            $str = $row['product'];
            $arr = json_decode($str, true);
            foreach ($object as $value) {
                $id1 = $value['id'];
                $img1 = $value['img'];
                if ($id == $id1) {
                    array_push($arr, $value);
                    $col1 = json_encode($arr, true);
                    $sql = "UPDATE shopping_cart_users set  product ='$col1' where name ='$sesName' && password ='$sesPass'";
                    if ($conn->query($sql) == TRUE) {
                        header('location:main.php');
                    }
                }
            }
        } 
        else {
            $arr = array();
            foreach ($object as $value) {
                $id1 = $value['id'];
                if ($id == $id1) {
                    array_push($arr, $value);
                    $col = json_encode($arr , true);
                    $sql = "UPDATE shopping_cart_users set  product ='$col' where name ='$sesName' && password ='$sesPass'";
                    if ($conn->query($sql) == TRUE) {
                        header('location:main.php');
                    }
                }
            }
        }
    }
}

<?php ob_start(); ?>
<?php
include("connect.php");

$id = $_GET['delete'];

$sesName = $_SESSION['name'];
$sesPass = $_SESSION['password'];

$sql = "SELECT * from shopping_cart_users where name ='$sesName' && password='$sesPass'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $prod = $row['product'];
        $srt = json_decode($prod, true);
        foreach ($srt as $key => $value) {
            $id1 = $value['id'];
            if ($id == $id1) {
                unset($srt[$key]);
            }
        }
        $str = json_encode($srt, true);
        $sql = "UPDATE shopping_cart_users set  product ='$str' where name ='$sesName' && password ='$sesPass'";
        if ($conn->query($sql) == TRUE) {
            header('location:cart.php');
        }
    }
}

?>
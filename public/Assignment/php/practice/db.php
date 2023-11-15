
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "students1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    // die("connection failed".$conn->connect_error);
}
// echo "connected successfully";
if (!empty($_POST)) {
    $fullname = $_POST["name"];
    $email = $_POST['email'];
    $mobile = $_POST["mobile"];
    $sql = "INSERT INTO studentlist(fullname,email,mobile) VALUES('$fullname','$email','$mobile')";

    if ($conn->query($sql) == TRUE) {
        // echo "connected successfully";
        header('location:view.php');
    } else {
        // "failed" . $conn->error; 
    }
}
?>
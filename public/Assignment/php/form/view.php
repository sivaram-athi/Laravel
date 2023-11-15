<?php 

// include("database.php");
$servername="localhost";
$username="root";
$password="";
$dbname = "students";

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
    die("connection failed".$conn->connect_error);
}

$sql = "SELECT id, firstname, lastname,email FROM userList";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // echo "hello";
    while ($row = $result->fetch_assoc()) {
        echo "id:" . $row["id"] . " -firstName " . $row["firstname"] . " -lastName " . $row["lastname"] ." -email " . $row["email"] ."<br>";
    }
} else {
    echo " No result";
}


$conn->close();

?>
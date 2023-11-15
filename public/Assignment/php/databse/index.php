<?php



// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "myDB";

// // Create connection
// $conn = new mysqli($servername, $username, $password,$dbname);

// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
// echo "Connected successfully"."<br>";

// $sql = "INSERT INTO MyGuests (firstname, lastname)
// VALUES ('siva', 'ram')";

// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $conn->close();


$server = "localhost";
$username = "root";
$password = "";
$dbname = "sivaRam";

$conn = new mysqli($server, $username, $password, $dbname);

// if($conn->connect_error){
//     die("connection failed". $conn->connect_error);
// }
// echo "connected successfully";

// $sql = "CREATE DATABASE sivaRam";
// if($conn->query($sql) == TRUE){
//    echo "created successfully";
// }else{
//     echo "failed".$conn->error;
// }

// $sql = "CREATE TABLE myUsers(
//     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//     firstname VARCHAR(30) NOT NULL
// )";
// if($conn->query($sql)==TRUE){                                                             
//     echo "table created successfully";
// }else{
//     echo "failed".$conn->error;
// }
$name = $_POST["name"];
$sql = "INSERT INTO myUsers(firstname) VALUES('$name')";
// $sql = "INSERT INTO myUsers(firstname) VALUES('')  WHERE id=2";
if($conn->query($sql)==TRUE){
    echo "insert successfully". "<br>";
}else{
    echo "error".$conn->error;
}

// $name ="";
$sql = "SELECT * FROM myUsers";

// $sql = "SELECT id, firstname FROM myUsers WHERE firstname='siva'";

$result = $conn->query($sql);
  
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "id:" . $row["id"] . " -Name " . $row["firstname"] . "<br>";
    }
} else {
    echo " No result";
}


$conn->close();

?>

<form method="post">
    <input type="text" name="name">
    <!-- <button>submit</button> -->
    <input type="submit">
</form>
<?php 

$server ="localhost";
$username ="root";
$password="";
$dbname="users";

$connect =new mysqli($server,$username,$password,$dbname);

if($connect->connect_error){
  die("connect failed :".$connect->connect_error);
}else{
    echo "connect success";
}
echo "<br>";
$query=" SELECT * FROM students";

$result = $connect->query($query);

if($result->num_rows > 0){
    while($row =$result->fetch_assoc()){
        echo "id:".$row["id"]." -Name ".$row["name"].""."<br>";
    }
}else{
    echo " No result";
}$connect->close();
?>
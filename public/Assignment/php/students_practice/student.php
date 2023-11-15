<?php ob_start(); ?>
<?php
include("connect.php");

$stdName = $_SESSION['stdName'];
$stdPass = $_SESSION['stdPass'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cdn.jsdelivr.net_npm_bootstrap@5.0.2_dist_css_bootstrap.min.css">
    <style>
        img{
            height: 100px;
            width: 100px;
            border-radius: 50%;
        }
    </style>
</head>

<body class="container">
    <div class="text-center">
        <h1>welcome <?php echo $stdName; ?></h1>
    </div>
    <div class=" float-end">
        <a class="btn btn-success" href="index.php">Logout</a>
    </div>
    <?php 

     $sql = "select * from student_list_user where name='$stdName'";

     $result = $conn->query($sql);
     if($result->num_rows >0){
        while($row = $result->fetch_assoc()){
            $name1 = $row['name'];
            $img1 =$row['profile'];
            echo "
            $name1
            <img src='img/$img1'> 
            ";
        }
     }

    ?>
    
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Tamil</th>
                <th scope="col">English</th>
                <th scope="col">Maths</th>
                <th scope="col">Science</th>
                <th scope="col">Social</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM student_list_user where name='$stdName' && Password='$stdPass'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row['id'];
                    $name = $row['name'];
                    $tamil = $row['tamil'];
                    $english = $row['english'];
                    $maths = $row['maths'];
                    $science = $row['science'];
                    $social = $row['social'];
                    $total = $row['total'];
                    echo "<tr>
                    <td>$id</td>
                    <td>$name</td>
                    <td>$tamil</td>
                    <td>$english</td>
                    <td>$maths</td>
                    <td>$science</td>
                    <td>$social</td>
                    <td>$total</td>
                    </tr>";
                }
            }
            else{
                echo "no result";
            }
            ?>
        </tbody>
    </table>
</body>

</html>
<?php ob_start(); ?>
<?php
include("connect.php");

$sesName = $_SESSION['AdminName'];
$sesPass = $_SESSION['AdminPass'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cdn.jsdelivr.net_npm_bootstrap@5.0.2_dist_css_bootstrap.min.css">
</head>

<body class="container">
    <div class="text-center">
        <h1>welcome <?php echo $sesName; ?></h1>
    </div>
    <div class=" float-start">
        <a class="btn btn-info" href="user.php">Add user</a>
    </div>
    <div class=" float-end">
        <a class="btn btn-success" href="index.php">Logout</a>
    </div>

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
                <th scope="col">operations</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM student_list_user where name NOT LIKE ''";
            $result = $conn->query($sql);
            $uid=1;
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
                    <td>$uid</td>
                    <td>$name</td>
                    <td>$tamil</td>
                    <td>$english</td>
                    <td>$maths</td>
                    <td>$science</td>
                    <td>$social</td>
                    <td>$total</td>
                    <td><button class='btn btn-primary '><a href='update.php?update=$id' class='text-light text-decoration-none'>update</a></button>  
                    <button class='btn btn-danger'><a href='delete.php?del=$id' class='text-light text-decoration-none'>delete</a></button></td>
                    </tr>";
                    $uid++;  }  
            }
            // else{
            //     echo "no result";
            // }
            ?>
        </tbody>
    </table>
</body>

</html>


 
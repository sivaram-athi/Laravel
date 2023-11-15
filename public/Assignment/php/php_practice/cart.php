<?php ob_start(); ?>
<?php
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="cdn.jsdelivr.net_npm_bootstrap@5.0.2_dist_css_bootstrap.min.css">
</head>

<body class="mt-5">
    <div class="container text-center">
        <a href="main.php" class="btn btn-info">back</a>
    </div>
    <div class="pt-5 container-fluid p-5 siv">
        <div class="row ss d-flex justify-content-evenly">
            <?php
            $sesName = $_SESSION['name'];
            $sesPass = $_SESSION['password'];
            $sql = "SELECT product from shopping_cart_users where name = '$sesName' && password ='$sesPass'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // echo  $row["product"];
                    $var = $row['product'];
                    $str = json_decode($var, true);
                    // print_r($str) ;
                    foreach ($str as $value) {
                        $id = $value['id'];
                        $title = $value['title'];
                        $image = $value['img'];
                        $price = $value['price'];
                        echo "<div class='col-md-2 m-2 text-center ' >
                    <img src='$image' alt='' class='mt-5 img-fluid mb-2'>
                    <h3 class=' text-center'>$title</h3>
                    <h4>price: <span class=' text-light'>$price</span></h4>
                    <a href='delete.php?delete=$id' class='btn btn-danger cart mt-3 mb-3'>Delete</a>
                    </div>
                    ";
                    }
                }
            }
            ?>
        </div>
    </div>
</body>

</html>
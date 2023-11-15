<?php ob_start(); ?>
<?php include("connect.php") ?>

<?php
$ids =$_SESSION['ids'];
$name1=$_SESSION['movie_name'];
$min = $_SESSION['count'];
$min1 = $_SESSION['count1'];
$sql = "SELECT * FROM movie_ticket_movies where id='$min1'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id1 = $row['id'];
        $movie_name = $row['movie_name'];
        $movie_time = $row['movie_time'];
        $movie_image = $row['movie_image'];
        $movie_price = $row['movie_price'];
        $movie_ticket = $row['movie_ticket'];
        $price = $min * $movie_price;
        $bal_ticket = $movie_ticket - $min;
    }
}
$tot = 0;
$var = 0;
if (isset($_POST['add'])) {
    $sql = "SELECT * FROM movie_ticket_snacks";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $sss = $row['snack_name'];
            $ddd = $row['snack_price'];
            $var += $_POST[$sss] * $ddd;
        }
        $_SESSION['tot']=$var;
        // $tot = $_SESSION['tot'];
    }
}
$tot = $_SESSION['tot'];

// $tot = $var;
// echo $tot;

$total = $price + $tot;
// echo $total;

if(isset($_POST['submit'])){
    $sql ="INSERT INTO movie_ticket_booking(movie_name,ticket_price,snacks_price,total,user_id) VALUES('$name1','$price','$tot','$total','$ids')";
    if ($conn->query($sql) == true) {
        $sql = "UPDATE movie_ticket_movies SET movie_ticket='$bal_ticket' where id='$min1'";
        if ($conn->query($sql) == true) {
            header("location:success.php");                                                   
        }
        else{
            echo 'error'.$conn->error;
        }
    }
    else{
        echo 'error'.$conn->error;
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cdn.jsdelivr.net_npm_bootstrap@5.0.2_dist_css_bootstrap.min.css">
    <style>
        body {
            background: gray;
        }

        img {
            height: 160px !important;
            width: 200px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <h3>Ticket Price : <span class=' text-danger'> <?php echo $price ?></span></h3>
            </div>
            <div class="col-md-3">
                <h3>snacks Price : <span class=' text-danger'> <?php echo $var ?></span></h3>
            </div>
            <div class="col-md-3">
                <h3>Total Price : <span class=' text-danger'> <?php echo $total ?></span></h3>
            </div>
            <div class="col-md-2">
                <form method="post">
                    <button type="submit" class="btn btn-info" name="submit">Pay</button>
                </form>
            </div>
            <div class="col-md-1">
                <a href="main.php" class="btn btn-danger">Cancel</a>
            </div>
        </div>
    </div>
    <div>
        <form method="post">
            <table class="table text-light">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">SNACKS</th>
                        <th scope="col">NAME</th>
                        <th scope="col">PRICE</th>
                        <th scope="col">QUANTITY</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM movie_ticket_snacks";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $snack_id = $row['id'];
                            $snack_name = $row['snack_name'];
                            $snack_image = $row['snacks_image'];
                            $snack_price = $row['snack_price'];
                            echo "<tr>
                    <td><h3>$snack_id</h3></td>
                    <td><img src='assets/img/$snack_image' alt='' class='mt-2 img-thumbnail img-fluid mb-2'></td>
                    <td><h3 class='mt-5'>$snack_name</h3></td>
                    <td><h3 class='mt-5'>$snack_price</h3></td>
                    <td><input class='mt-5' type ='number' value='0' name ='$snack_name'></td>
                    </tr>";
                        }
                    } else {
                        echo "no result";
                    }
                    ?>
                </tbody>
            </table>
            <div class=" text-center">
                <button type="submit" class="btn btn-info mb-5" name="add">ADD</button>
            </div>
        </form>
    </div>
</body>

</html>
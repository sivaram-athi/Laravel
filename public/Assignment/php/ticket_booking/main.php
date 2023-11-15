<?php ob_start(); ?>
<?php include("connect.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="cdn.jsdelivr.net_npm_bootstrap@5.0.2_dist_css_bootstrap.min.css">
    <style>
        img{
            height: 350px !important;
            width: 400px !important;
        }
        body{
            background: gray;
        }
        h3{
            color: #006699;
        }
    </style>
</head>

<body class="d-flex flex-column ">
    <div class="container bg-gradient text-center p-2 mt-5">
        <h1 class=" float-start">welcome <?php echo $_SESSION['name']; ?></h1>
        <a href="show.php" class="btn btn-info">MY SHOW</a>  
        <a href="index.php" class="btn btn-info float-end">LOGOUT</a>
    </div>
    <div class="pt-5 container-fluid p-5 ">
        <div class="row d-flex justify-content-evenly">
            <?php
            $sql = "SELECT * FROM movie_ticket_movies";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id=$row['id'];
                    $movie_name = $row['movie_name'];
                    $movie_time = $row['movie_time'];
                    $movie_image = $row['movie_image'];
                    $movie_price = $row['movie_price'];
                    $movie_ticket = $row['movie_ticket'];
                    echo "<div class='col-md-4  text-center ' >
                <img src='assets/img/$movie_image' alt='' class='mt-2 img-thumbnail img-fluid mb-2'>
                <h3 class=''>$movie_name</h3>
                <h4>price: <span class=' text-light'>$movie_price</span></h4>
                <h4>Movie Time: <span class=' text-light'>$movie_time</span></h4>
                <a href='select.php?id=$id' class='btn btn-primary cart mt-3 mb-3' >View</a>             
                </div>";
                }
            } else {
                echo "0 results";
            }
            ?>
        </div>
    </div>
</body>

</html>
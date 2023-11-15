<?php ob_start(); ?>
<?php include("connect.php") ?>

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
    <!-- <div class="container">
        </div> -->
    <div class="container text-center">
        <h1 class=" float-start">welcome <?php echo $_SESSION['name']; ?></h1>
        <a href="index.php" class="btn btn-info float-end">logout</a>
        <a href="cart.php" class="btn btn-success">go to cart</a>
    </div>
    <div class="pt-5 container-fluid p-5 siv">
        <div class="row ss d-flex justify-content-evenly">
            <?php
            foreach ($object as $value) {
                $id = $value['id'];
                $title = $value['title'];
                $img = $value['img'];
                $price = $value['price'];
                echo "<div class='col-md-2 m-2 text-center ' >
                <img src='$img' alt='' class='mt-2  img-fluid mb-2'>
                <h3 class=' text-center'>$title</h3>
                <h4>price: <span class=' text-light'>$price</span></h4>
                <a href='update.php?id=$id' class='btn btn-primary cart mt-3 mb-3' >Add to cart</a>             
                </div>";
            }
            ?>
        </div>

    </div>
</body>

</html>
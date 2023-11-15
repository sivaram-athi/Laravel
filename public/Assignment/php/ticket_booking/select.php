<?php ob_start(); ?>
<?php include('connect.php') ?>

<?php
$id = $_GET['id'];

$sesName = $_SESSION['name'];
$sesPass = $_SESSION['password'];
// $_SESSION['count'] = $_GET['quan'];

if (isset($_GET['submit'])) {
    $_SESSION['count'] = $_GET['quan'];
    $_SESSION['count1'] = $_GET['quan1'];
    $ss = $_SESSION['movie_ticket'];
    if ($_SESSION['count'] > $ss) {
        header("location:unavailable.php");
    } else {
        header("location:next.php");
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

        h3 {
            color: #006699;
        }
    </style>
</head>

<body>
    <div class="container mt-5 pt-5">
        <div class=" d-flex justify-content-center">
            <?php
            $sql = "SELECT * FROM movie_ticket_movies where id='$id'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id1 = $row['id'];
                    $movie_name = $row['movie_name'];
                    $_SESSION['movie_name'] = $row['movie_name'];
                    $movie_time = $row['movie_time'];
                    $movie_image = $row['movie_image'];
                    $movie_price = $row['movie_price'];
                    $movie_ticket = $row['movie_ticket'];
                    $_SESSION['movie_ticket'] = $row['movie_ticket'];
                    
                    if ($movie_ticket == 0) {
                        header("location:soldout.php");
                    } else if ($movie_ticket > 0) {
                        echo "<div class='col-md-4  text-center ' >
                <img src='assets/img/$movie_image' alt='' class='mt-2 img-thumbnail img-fluid mb-2'>
                <h3 class=''>$movie_name</h3>
                <h4>Available Tickets: <span class=' text-light'>$movie_ticket</span> Tickets</h4>
                <form>
                <input type ='number' min ='1' value='1' name ='quan'>
                <input class='visually-hidden' type ='number' value=$id name ='quan1'>
                <button type='submit' name='submit' class='btn btn-primary mt-3 mb-3'>Done</button> </form>            
                </div>";
                    }
                }
            }
            ?>
        </div>
    </div>
</body>

</html>
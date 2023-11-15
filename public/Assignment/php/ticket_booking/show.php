<?php ob_start(); ?>
<?php include("connect.php") ;

$name = $_SESSION["name"];
$id1 =$_SESSION["ids"];
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
    </style>
</head>
<body class=" container">
    <a href="main.php" class="btn btn-danger float-end">back</a>    
    <h1 class="text-center text-light mb-5 mt-3">Your shows</h1>
<table class="table text-light">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Movie Name</th>
                        <th scope="col">Ticket Price</th>
                        <th scope="col">Snacks price</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT u.id, b.movie_name,b.ticket_price,b.snacks_price,b.total
                    FROM movie_ticket_user AS u
                    INNER JOIN movie_ticket_booking AS b ON b.user_id = u.id where b.user_id = '$id1'";
                    $result = $conn->query($sql);
                    $uid=1;
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $id = $row['id'];
                            $movie_name = $row['movie_name'];
                            $ticket_price = $row['ticket_price'];
                            $snack_price = $row['snacks_price'];
                            $total_price = $row['total'];
                            echo "<tr>
                    <td><h3>$uid</h3></td>
                    <td><h3>$movie_name</h3></td>
                    <td><h3>$ticket_price</h3></td>
                    <td><h3>$snack_price</h3></td>
                    <td><h3>$total_price</h3></td>
                    </tr>";
                    $uid++;
                        }
                    } else {
                        echo "no result";
                    }
                    ?>
                </tbody>
            </table>
</body>
</html>
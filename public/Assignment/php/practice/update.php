<?php include("db.php") ?>

<?php

$id1 = $_GET['update'];
if (isset($POST['submit'])) {
    $name1 = $row["fullName"];
    $email1 = $row["email"];
    $mobile1 = $row["mobile"];
    $sql = "UPDATE studentlist set where id ='$id1',fullName='$name1',email='$email1',mobile='$mobile1' WHERE id ='$id1'";
    if ($conn->query($sql) == TRUE) {
        echo "connected successfully";
        // header('location:view.php');
    } else {
        echo "error";
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
</head>

<body class="container mt-5 pt-5">


    <form method="post" class="mt-5 pt-5">
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="" name="name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="" name="email">
        </div>

        <div class="mb-3">
            <label for="mobile" class="form-label">mobile No:</label>
            <input type="text" class="form-control" id="" name="mobile">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">update</button>
    </form>


    <script src="code.jquery.com_jquery-3.7.0.min.js"></script>


</body>

</html>
<?php include("database.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cdn.jsdelivr.net_npm_bootstrap@5.0.2_dist_css_bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body class="mt-5">


    <div class="container">
        <form method="post" action="">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="" name="email">
            </div>
            <div class="mb-3">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="" name="firstname">
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="" name="lastname">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php include("view.php") ?>
    </div>


    <script src="code.jquery.com_jquery-3.7.0.min.js"></script>
    <script src="script.js"></script>
</body>

</html>
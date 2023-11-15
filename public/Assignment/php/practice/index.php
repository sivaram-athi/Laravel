<?php include("db.php") ?>

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
            <input type="text" class="form-control" id="" name="name" >
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="" name="email" >
        </div>
        
        <div class="mb-3">
            <label for="mobile" class="form-label">mobile No:</label>
            <input type="text" class="form-control" id="" name="mobile" >
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>


    <script src="code.jquery.com_jquery-3.7.0.min.js"></script>


</body>

</html>
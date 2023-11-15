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


    <a class="btn btn-info" href="index.php">Add user</a>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">mobile</th>
                <th scope="col">operation</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM studentlist";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id1 = $row["id"];
                    $name1=$row["fullName"];
                    $email1 =$row["email"];
                    $mobile1 =$row["mobile"];
                    
                    echo "<tr>
                    <th scope='row'>$id1 </th>
                    <td> $name1 </td>
                    <td> $email1 </td>
                    <td> $mobile1 </td>
                    <td><button class='btn btn-primary '><a href='update.php?update=$id1' class='text-light text-decoration-none'>update</a></button>  
                    <button class='btn btn-danger'><a href='delete.php?del=$id1' class='text-light text-decoration-none'>delete</a></button></td>
                  </tr>";
                }
            } else {
                echo " No result";
            }

            ?>
        </tbody>

    </table>

</body>

</html>
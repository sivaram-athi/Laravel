<?php ob_start(); ?>
<?php

include("connect.php");

$error = '';
$id1 = $_GET['update'];

$sql = "SELECT * from crud_users where id =$id1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
// $id1 = $row["id"];
$name2 = $row["name"];
$email2 = $row["email"];
$mobile2 = $row["mobile"];
if ($_POST) {
    if (!$_POST["name"]) {
        $error .= "name field is required </br>";
    }
    if (!$_POST["email"]) {
        $error .= "email field is required </br>";
    }
    if (!$_POST["mobile"]) {
        $error .= "mobile field is required </br>";
    }
    if ($error != "") {
        $error = "<div class='alert alert-danger' role='alert'> $error </div>";
    } else if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $sql = "UPDATE crud_users  SET id='$id1', name ='$name',email='$email',mobile ='$mobile' WHERE id = '$id1'";
        if ($conn->query($sql) == TRUE) {
            header('location:view.php');
        } else {
        }
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
    <link rel="stylesheet" href="style.css">
</head>

<body class="container mt-5 pt-5">


    <form method="post" class="mt-5 pt-5">
        <div id="error"><?php echo $error; ?>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="" name="name" value="<?php echo $name2 ?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="" name="email" value="<?php echo $email2 ?>">
        </div>

        <div class="mb-3">
            <label for="mobile" class="form-label">mobile No:</label>
            <input type="text" class="form-control" id="" name="mobile" value="<?php echo $mobile2 ?>">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Update</button>
    </form>

</body>

</html>
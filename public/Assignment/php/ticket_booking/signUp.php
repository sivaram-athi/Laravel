<?php ob_start(); ?>
<?php include("connect.php") ?>

<?php

// $errors = '';
$message = '';
if ($_POST) {
    if (isset($_POST['submit'])) {
        $name = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "INSERT INTO movie_ticket_user (name,email,password) VALUES ('$name','$email','$password')";
        if ($conn->query($sql) == TRUE) {
            $message = 'Register successfully';
        } else {
            $message = "failed" . $conn->error;
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
    <link rel="stylesheet" href="style1.css">
</head>

<body>
    <section>
        <form method="post">
            <h1>Login</h1>
            <div class="inputbox">
                <input type="text" name="username" required>
                <label>Name</label>
            </div>
            <div class="inputbox">
                <input type="email" name="email" required>
                <label>Email</label>
            </div>
            <div class="inputbox">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <button type="submit" name="submit">Sign Up</button>
            <div class="register">
                <p><a href="index.php">Back to login</a></p>
            </div>
            <h4><?php echo $message; ?></h4>
        </form>
    </section>
</body>

</html>
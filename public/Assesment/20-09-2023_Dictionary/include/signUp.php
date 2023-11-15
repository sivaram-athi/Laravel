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
        $encpass = md5($password);
        $sql = "INSERT INTO dictionary_users (name,email,password,entry_path,register_path) VALUES ('$name','$email','$encpass','{$_SESSION['entry_url']}','{$_SESSION['reg_url']}')";
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
    <link rel="stylesheet" href="assets/css/style.css">
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
                <p><a href="login.php">Back to login</a></p>
            </div>
            <h4><?php echo $message; ?></h4>
        </form>
    </section>
</body>

</html>
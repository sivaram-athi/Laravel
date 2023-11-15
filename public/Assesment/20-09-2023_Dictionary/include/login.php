<?php ob_start(); ?>
<?php include("connect.php"); ?>
<?php

$error = '';
if (isset($_POST['submit'])) {
    $name1 = $_POST['logName'];
    $password1 = $_POST['logPass'];
    $encpass1 = md5($password1);
    $error = "";
    $sql = "SELECT id ,name,password,is_admin from dictionary_users where name ='$name1' and password ='$encpass1'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $name = $row["name"];
            $_SESSION["name"] = $name;
            // $_SESSION["name"] =$name;
            $is_admin = $row['is_admin'];
            $pass = $row['password'];
            $_SESSION["ids"] = $row["id"];
            $_SESSION["password"] = $row["password"];
        }
        if ($is_admin == 1 && $pass == $encpass1 && $name== $name1) {
            header("location:adminpage.php");
        } else {
            header("location:main.php");
        }
    }
    else {
        $error = "not match";
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
                <input type="text" name="logName" required>
                <label>Name</label>
            </div>
            <div class="inputbox">
                <input type="password" name="logPass" required>
                <label for="">Password</label>
            </div>
            <button type="submit" name="submit">Log in</button>
            <div class="register">
                <p>Don't have a account <a href="signUp.php">Register</a></p>
            </div>
            <h4><?php echo $error; ?></h4>
        </form>
    </section>
</body>

</html>
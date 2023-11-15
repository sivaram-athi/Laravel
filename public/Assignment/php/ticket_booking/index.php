<?php ob_start(); ?>
<?php include("connect.php"); ?>
<?php

$error = '';
if (isset($_GET['submit'])) {
    $name1 = $_GET['logName'];
    $password1 = $_GET['logPass'];
    $error = "";
    $sql = "SELECT id ,name,password from movie_ticket_user where name ='$name1' && password='$password1'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $_SESSION["name"] =$row["name"] ;
            $_SESSION["ids"] = $row["id"] ;
            $_SESSION["password"] =$row["password"] ;
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
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section>
        <form>
            <h1>Login</h1>
            <div class="inputbox">
                <input type="text" name="logName" required>
                <label>Name</label>
            </div>
            <div class="inputbox">
                <input type="password" name="logPass" required>
                <label for="">Password</label>
            </div>
            <div class="forget">
                <label for=""><input type="checkbox">Remember Me</label>
                <a href="#">Forget Password</a>
            </div>
            <button type="submit" name="submit">Log in</button>
            <div class="register">
                <p>Don't have a account <a href="signUp.php">Register</a></p>
            </div>
            <h4><?php echo $error;?></h4>
        </form>
    </section>
</body>

</html>
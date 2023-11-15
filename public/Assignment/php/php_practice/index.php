<?php ob_start(); ?>
<?php include("connect.php") ?>

<?php
$errors = '';
if ($_POST) {
    if (!$_POST["signUpName"]) {
        $errors .= "name field is required </br>";
    }
    if (!$_POST["signUpEmail"]) {
        $errors .= "email field is required </br>";
    }
    if (!$_POST["signUpPassword"]) {
        $errors .= "password field is required </br>";
    } else if (isset($_POST['submit'])) {
        $name = $_POST['signUpName'];
        $email = $_POST['signUpEmail'];
        $password = $_POST['signUpPassword'];
        $sql = "INSERT INTO shopping_cart_users (name,email,password) VALUES ('$name','$email','$password')";
        if ($conn->query($sql) == TRUE) {
            
        } else {
            echo "failed".$conn->error;
        }
    }
}

$error = '';
if (isset($_GET['submit1'])) {
    $name1 = $_GET['loginName'];
    $password1 = $_GET['loginPassword'];
    $error = "";
    $sql = "SELECT id ,name,password from shopping_cart_users where name ='$name1' && password='$password1'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $_SESSION["name"] =$row["name"] ;
            $_SESSION["password"] =$row["password"] ;
            header("location:main.php");
        }
    } else {
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

<body class="bod">
    <div class="container" id="cont">
        <form>
            <div class="forms">
                <div class="sign-in-form form">
                    <h1>Sign in</h1>
                    <h5>or use your account</h5>
                    <input class="input-text" type="text"  name="loginName" placeholder="Name" autocomplete="off">
                    <input class="input-text" type="password" minlength="4" name="loginPassword" placeholder="Password">
                    <a href="#" class="forgot">Forgot your password?</a>
                    <button type="submit" name="submit1" class="sign-in-btn butt btn">Sign in</button>
                    <h4><?php echo $error; ?></h4>
                </div>
            </div>
        </form>
        <form method="post">
            <div class="forms">
                <div class="sign-up-form form">
                    <h1>Create Account</h1>
                    <h5>or use your email for registration</h5>
                    <input class="input-text" type="text" name="signUpName" placeholder="Name">
                    <input class="input-text" type="email" name="signUpEmail" placeholder="Email">
                    <input class="input-text" type="password" name="signUpPassword" placeholder="Password">
                    <button type="submit" name="submit" class="sign-in-btn butt btn">Sign up</button>
                    <h4><?php echo $errors; ?></h4>
                </div>
            </div>
        </form>
        <div class="select">
            <div class="select-sign-in">
                <h1>Welcome Back!</h1>
                <h3>To keep connected with us please login with your personal info</h3>
                <a href="#" class="select-sign-in-btn butt btn">Sign in</a>
            </div>
            <div class="select-sign-up">
                <h1>Hello, friend!</h1>
                <h3>Enter your personal details and start your journey with us</h3>
                <a href="#" class="select-sign-up-btn butt btn">Sign up</a>

            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>
<?php ob_start(); ?>
<?php

include("connect.php");

$errors = "";
$error = '';
if (isset($_GET['submit'])) {
    if (!$_GET["signUpName"]) {
        $errors .= "name field is required </br>";
    }
    if (!$_GET["signUpPass"]) {
        $errors .= "password field is required </br>";
    } else if (isset($_GET['submit'])) {
        $name = $_GET['signUpName'];
        $pass = $_GET['signUpPass'];
        $error = '';
        $sql = "SELECT AdminName,AdminPass from student_list_user where AdminName='$name' && AdminPass ='$pass'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $_SESSION['AdminName'] = $row["AdminName"];
                $_SESSION['AdminPass'] = $row["AdminPass"];
                header("location:adminpage.php");
            }
        } else {
            $error = 'not match';
        }
    }
}
$errors1 = "";
$error1 = '';
if (isset($_GET['submit1'])) {
    if (!$_GET["logName"]) {
        $errors1 .= "name field is required </br>";
    }
    if (!$_GET["logPass"]) {
        $errors1 .= "password field is required </br>";
    } else if (isset($_GET['submit1'])) {
        $name1 = $_GET['logName'];
        $pass1 = $_GET['logPass'];
        $error1 = '';
        $sql = "SELECT name,password from student_list_user where name='$name1' && password ='$pass1'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $_SESSION['stdName'] = $row['name'];
                $_SESSION['stdPass'] = $row['password'];
                header("location:student.php");
            }
        } else {
            $error1 = 'not match';
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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="cdn.jsdelivr.net_npm_bootstrap@5.0.2_dist_css_bootstrap.min.css">
</head>

<body class="bod">
    <section>
        <div class="section">
            <div class="container">
                <div class="row full-height justify-content-center">
                    <div class="col-12 text-center align-self-center py-5">
                        <div class="section pb-5 pt-5 pt-sm-2 text-center">
                            <h6 class="mb-0 pb-3"><span>Student </span><span>Admin</span></h6>
                            <input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
                            <label for="reg-log"></label>
                            <div class="card-3d-wrap mx-auto">
                                <div class="card-3d-wrapper">
                                    <div class="card-front">
                                        <div class="center-wrap">
                                            <div class="section text-center">
                                                <form method="get">
                                                    <h4 class="mb-4 pb-3">Student</h4>
                                                    <div class="form-group">
                                                        <input type="text" name="logName" class="form-style" placeholder="Your Name">
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <input type="password" name="logPass" class="form-style" placeholder="Your Password">
                                                    </div>
                                                    <h4><?php echo $errors1; ?></h4>
                                                    <h4><?php echo $error1; ?></h4>
                                                    <button type="submit" name="submit1" class="btn mt-4">submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-back">
                                        <div class="center-wrap">
                                            <div class="section text-center">
                                                <form method="get">
                                                    <h4 class="mb-4 pb-3">Admin</h4>
                                                    <div class="form-group">
                                                        <input type="text" name="signUpName" class="form-style" placeholder="Your Name">
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <input type="password" name="signUpPass" class="form-style" placeholder="Your Password">
                                                    </div>
                                                    <h4><?php echo $errors; ?></h4>
                                                    <h4><?php echo $error; ?></h4>
                                                    <button type="submit" name="submit" class="btn mt-4">submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
<?php ob_start(); ?>
<?php
include("connect.php");

$error ='';
if ($_POST) {
    if (!$_POST["username"]) {
        $error .= "name field is required </br>";
    }
    if (!$_POST["userpass"]) {
        $error .= "password field is required </br>";
    } 
    else if (isset($_POST['submit2'])) {
        $name = $_POST['username'];
        $password = $_POST['userpass'];
        $tamil = $_POST['tamil'];
        $english = $_POST['english'];
        $maths = $_POST['maths'];
        $science = $_POST['science'];
        $social = $_POST['social'];
        $total = $_POST['total'];
        $sql = "INSERT INTO student_list_user (name,tamil,english,maths,science,social,total,password) VALUES ('$name','$tamil','$english','$maths','$science','$social','$total','$password')";
        $_SESSION['username'] = $name;
        if ($conn->query($sql) == TRUE) {
            header('location:image.php');
        } else {
            echo "failed".$conn->error;
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
    <link rel="stylesheet" href="cdn.jsdelivr.net_npm_bootstrap@5.0.2_dist_css_bootstrap.min.css">
</head>

<body class="bod">
    <section>
        <div class="section">
            <div class="container">
                <div class="row full-height justify-content-center">
                    <div class="col-12 text-center align-self-center py-5">
                        <div class="section pb-5 pt-5 pt-sm-2 text-center">
                            <h6 class="mb-0 pb-3"><span>Add Users </span></h6>
                            <div class="card-3d-wrap mx-auto">
                                <div class="card-3d-wrapper">
                                    <div class="card-front">
                                        <div class="center-wrap">
                                            <div class="section text-center">
                                                <form method="post">
                                                    <h4 class="mb-4 pb-3">User Details</h4>
                                                    <div class="form-group">
                                                        <input type="text" name="username" class="form-style"
                                                            placeholder="Your Name">
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <input type="text" name="tamil" class="form-style"
                                                            placeholder="Tamil Mark">
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <input type="text" name="english" class="form-style"
                                                            placeholder="English Mark">
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <input type="text" name="maths" class="form-style"
                                                            placeholder="Maths Mark">
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <input type="text" name="science" class="form-style"
                                                            placeholder="Science Mark">
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <input type="text" name="social" class="form-style"
                                                            placeholder="Social Mark">
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <input type="text" name="total" class="form-style"
                                                            placeholder="Total Mark">
                                                    </div>
                                                    <div class="form-group mt-2 mb-2">
                                                        <input type="password" name="userpass" class="form-style"
                                                            placeholder="Your Password">
                                                    </div>
                                                    <h4><?php echo $error; ?></h4>
                                                    <button type="submit" name="submit2" class="btn mt-4">Add</button>
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
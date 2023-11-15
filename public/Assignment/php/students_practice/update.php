<?php ob_start(); ?>
<?php

include("connect.php");

$error = '';
$id1 = $_GET['update'];

$sql = "SELECT * from student_list_user where id =$id1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
// $id1 = $row["id"];
$name = $row["name"];
$tamil = $row["tamil"];
$english = $row["english"];
$maths = $row["maths"];
$science = $row["science"];
$social = $row["social"];
$total = $row["total"];
$password = $row["password"];
if ($_POST) {
    if (isset($_POST['submit'])) {
        $name = $_POST['username'];
        $password = $_POST['userpass'];
        $tamil = $_POST['tamil'];
        $english = $_POST['english'];
        $maths = $_POST['maths'];
        $science = $_POST['science'];
        $social = $_POST['social'];
        $total = $_POST['total'];
        $sql = "UPDATE student_list_user  SET  name ='$name',tamil='$tamil',english ='$english',maths='$maths',science='$science',social ='$social',total='$total',password='$password' WHERE id = '$id1'";
        if ($conn->query($sql) == TRUE) {
            header('location:adminpage.php');
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
    <link rel="stylesheet" href="style1.css">
</head>

<body class="bod">
    <section>
        <div class="section">
            <div class="container">
                <div class="row full-height justify-content-center">
                    <div class="col-12 text-center  py-5">
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
                                                        <input type="text" name="username" class="form-style" value="<?php echo $name ?>" placeholder="Your Name">
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <input type="text" name="tamil" class="form-style" value="<?php echo $tamil ?>" placeholder="Tamil Mark">
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <input type="text" name="english" class="form-style" value="<?php echo $english ?>" placeholder="English Mark">
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <input type="text" name="maths" class="form-style" value="<?php echo $maths ?>" placeholder="Maths Mark">
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <input type="text" name="science" class="form-style" value="<?php echo $science ?>" placeholder="Science Mark">
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <input type="text" name="social" class="form-style" value="<?php echo $social ?>" placeholder="Social Mark">
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <input type="text" name="total" class="form-style" value="<?php echo $total ?>" placeholder="Total Mark">
                                                    </div>
                                                    <div class="form-group mt-2 mb-2">
                                                        <input type="password" name="userpass" class="form-style" value="<?php echo $password ?>" placeholder="Your Password">
                                                    </div>
                                                    <h4><?php echo $error; ?></h4>
                                                    <button type="submit" name="submit" class="btn mt-4">Update</button>
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
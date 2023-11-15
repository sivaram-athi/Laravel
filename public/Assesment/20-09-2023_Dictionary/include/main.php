<?php ob_start(); ?>
<?php include("connect.php") ?>

<?php

if (isset($_SESSION["name"])) {

}
else{
    header("location:../index.php");
}

$user = $_SESSION["name"];
$id = $_SESSION["ids"];
$message = '';
if ($_GET) {
    if (isset($_GET['submit'])) {
        $sear = $_GET['search'];
        $searc = str_replace(' ', '', $sear);
        $search =strtolower($searc);
        $sql = "SELECT * from dictionary_words where  word_name='$search' and (user_id='$id' or status='1')";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $word = $row['word_name'];
                $status = $row['status'];
                $_SESSION['word_id'] = $row['word_id'];
                $_SESSION['words'] = $word;
                if ($search == $_SESSION['words']) {
                    header("location:$search");
                }
            }
        } else if ($search != $_SESSION['words']) {
            header("location:4041.php");
        } else {
            header("location:4041.php");
        }
    }
}

if (isset($_POST['submit1'])) {
    header("location:../index.php");
    session_destroy();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/cdn.jsdelivr.net_npm_bootstrap@5.0.2_dist_css_bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body style="background:url(assets/img/mountains.jpg); background-repeat:no-repeat; background-size:cover;">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container">
            <a class="navbar-brand glow" href="#">
                <h1>Dictionary</h1>
            </a>
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation ">
                <span class="navbar-toggler-icon "></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item  me-5">
                        <h4>
                            <a class="nav-link one text-info" href="add.php">+</a>
                        </h4>
                    </li>
                    <li class="nav-item">
                        <h4>
                            <form method='post'>
                                <input type='submit' name='submit1' value='Logout' class='btn fs-4 nav-link two text-danger'>
                            </form>
                        </h4>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="mt-5 text-center">
            <h2 class="text-warning">Welcome <span class="text-light"><?php echo $user; ?></span></h2>
            <span></span>
        </div>
        <div class=" shadow-lg rounded hell1" style="background:#00000030;">
            <h3 class="text-warning text-center mb-4"><?php echo $message; ?></h4>
                <div class="d-grid justify-content-center  hel rounded" style="background:#0000004f !important;">
                    <h2 class="text-warning mx-auto mb-3">Search Word Here</h2>
                    <form class="text-center">
                        <input type="text" name="search" class="in  form-control" required>
                        <input type="submit" name="submit" value="Search" class="btn btn-secondary mt-3  mx-auto">
                    </form>
                </div>
        </div>
    </div>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
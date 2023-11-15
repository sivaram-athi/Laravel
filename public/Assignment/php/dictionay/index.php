<?php include("./include/connect.php") ?>

<?php
$message ='';
if ($_POST) {
    if (isset($_POST['submit'])) {
        $sear = $_POST['search'];
        $search = str_replace(' ', '', $sear);
        $sql = "SELECT * from dictionary_words where status = 1 and word_name='$search'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $word = $row['word_name'];
                $_SESSION['word_id'] = $row['word_id'];
                $_SESSION['words'] = $word;
                if($search == $_SESSION['words']){
                    header("location:./include/guest_search.php?search=$search");
                } 
                else{
                    $conn->connect_error;
                }
            }
        }
        else if($search != $_SESSION['words']){
            header("location:./include/404.php");
        }
    }
}

$url = $_SERVER['REQUEST_URI'];
$urlarray = explode("/",$url);
$end = $urlarray[count($urlarray)-3];
$end1 = $urlarray[count($urlarray)-2];
$end2 = $urlarray[count($urlarray)-1];
$_SESSION['reg_url'] =$end ."/" . $end1 . '/'.$end2;
$_SESSION['entry_url'] =$end ."/" . $end1 . '/'.$end2;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="include/assets/css/cdn.jsdelivr.net_npm_bootstrap@5.0.2_dist_css_bootstrap.min.css">
    <link rel="stylesheet" href="include/assets/css/main.css">
</head>

<body>
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
                            <a class="nav-link one text-info" href="include/login.php">Login</a>
                        </h4>
                    </li>
                    <li class="nav-item">
                        <h4>
                            <a class="nav-link two text-warning" href="include/signUp.php">Register</a>
                        </h4>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class=" shadow-lg rounded hell">
            <div class="d-grid justify-content-center hel rounded">
                <h2 class="text-warning mx-auto mb-3">Search Word Here</h2>
                <form method="post" class="text-center">
                    <input type="text" name="search" class="in form-control" required>
                    <input type="submit" name="submit" value="Search" class="btn btn-secondary mt-3 mx-auto">
                </form>
            </div>
            <h4 class=" text-warning text-center"><?php echo $message; ?></h4>
        </div>
    </div>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
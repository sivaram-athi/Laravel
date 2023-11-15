<?php include("connect.php") ?>
<?php

$words = $_SESSION['words'];
$word_id =$_SESSION['word_id'];

if ($_GET) {
    if (isset($_GET['submit1'])) {
        $sear = $_GET['search'];
        $search = str_replace(' ', '', $sear);
        $sql = "SELECT * from dictionary_words where status = 1 and word_name='$search'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $word = $row['word_name'];
                $_SESSION['word_id'] = $row['word_id'];
                $_SESSION['words'] = $word;
                if ($search == $_SESSION['words']) {
                    header("location:guest_search.php?search=$word");
                } else {
                    $conn->connect_error;
                }
            }
        }
        else if($search != $_SESSION['words']){
            header("location:404.php");
        }
    }
}
$url = $_SERVER['REQUEST_URI'];
$urlarray = explode("/",$url);
$end = $urlarray[count($urlarray)-3];
$end1 = $urlarray[count($urlarray)-2];
$end2 = $urlarray[count($urlarray)-1];
$_SESSION['reg_url'] =$end ."/" . $end1 . '/'.$end2;
// $_SESSION['entry_url'] =$end ."/" . $end1 . '/'.$end2;

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
                            <a class="nav-link one text-info" href="login.php">Login</a>
                        </h4>
                    </li>
                    <li class="nav-item me-5">
                        <h4>
                            <a class="nav-link two text-danger" href="signUp.php">Register</a>
                        </h4>
                    </li>
                    <li class="nav-item">
                        <h4>
                            <a class="nav-link three text-warning" href="../index.php">Back</a>
                        </h4>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-2">
        <form  class="d-flex">
            <input type="text" name="search" class="form-control w-25 me-4" required>
            <input type="submit" name="submit1" value="Search" class="btn btn-secondary ">
        </form>
        <hr>
        <?php

        $sql = "SELECT * FROM dictionary_words where word_name = '{$_GET['search']}'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $name = $row['word_name'];
                $id = $row['word_id'];
                $_SESSION['word_id'] = $id;
                $image = $row['image'];
                $synonyms = $row['synonyms'];
                $antonyms = $row['antonyms'];
                $syn = json_decode($synonyms, true);
                $ant = json_decode($antonyms, true);
        ?>
                <h1 class='text-warning'>WORD : <span><?php echo $name ?></span></h1>
                <hr>
                <?php echo "
                <img class=' img-fluid' src='assets/images/$image'>"
                ?>
                <hr>
                <h5 class='text-warning'>Synonyms - <span class='text-light'><?php echo implode(", ", $syn) ?></span> </h5>
                <h5 class='text-warning'>Antonyms - <span class='text-light'><?php echo implode(", ", $ant) ?></span></h5>
        <?php echo "
                <hr>
                <div class='mb-3'>
                <label class='form-label'>
                <h5 class='text-warning'>-Add Comments Here-</h5>
                </label>
                <form method='post'>
                <textarea class='form-control' name='comment' disabled placeholder='Enter Your Comments' rows='3'></textarea>
                <input type='submit' name='submit' disabled value='post' class='btn btn-primary mt-3'>
                </form>
                </div>
                <hr>
                <h5 class='text-warning'>-Comments-</h5>
                <hr>
                ";
            }
        }?>
        <?php
        $sql1 = "SELECT c.comment,u.name FROM dictionary_comments AS c INNER JOIN dictionary_users AS u ON c.user_id = u.id AND c.word_id ='$id' AND c.status = 1;";
        $result1 = $conn->query($sql1);
        if ($result1->num_rows > 0) {
            while ($row1 = $result1->fetch_assoc()) {
                $user_name = $row1['name'];
                $user_cmt = $row1['comment'];
                echo "
                 <h4 class=' text-warning ms-2'>$user_name <span class=' ms-4 text-light'> - [ $user_cmt ]</span></h4>
                ";
            }
        }
        ?>

    </div>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
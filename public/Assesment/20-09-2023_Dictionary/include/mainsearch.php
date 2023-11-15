<?php ob_start(); ?>
<?php include("connect.php") ?>

<?php

$searchedWord = explode(".", basename($_SERVER['REQUEST_URI']))[0];

if (isset($_POST['logout'])) {
    header("location:../index.php");
    session_destroy();
}


if (isset($_POST['submit'])) {
    $comment = $_POST['comment'];
    $word_id = $_SESSION['word_id'];
    date_default_timezone_set("Asia/Calcutta");
    $date = date("Y-m-d h:i:s");
    // echo $date;
    $sql = "INSERT INTO dictionary_comments(comment,word_id,user_id,cmd_time) VALUES ('$comment','$word_id','{$_SESSION['ids']}','$date')";
    if ($conn->query($sql) == TRUE) {
    }
}

$url = $_SERVER['REQUEST_URI'];
$urlarray = explode("/", $url);
$end = $urlarray[count($urlarray) - 3];
$end1 = $urlarray[count($urlarray) - 2];
$end2 = $urlarray[count($urlarray) - 1];
$_SESSION['reg_url'] = $end . "/" . $end1 . '/' . $end2;

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
                            <?php
                            if (isset($_SESSION["name"])) {
                                echo " <a class='nav-link one text-info' href='add.php'>+</a>";
                            } else {
                                echo " <a class='nav-link one text-info' href='login.php'>Login</a>";
                            }
                            ?>
                        </h4>
                    </li>
                    <li class="nav-item me-5">
                        <h4>
                            <?php
                            if (isset($_SESSION["name"])) {
                                echo "
                                <form method='post'>
                                <input type='submit' name='logout' value='Logout' class='btn fs-4 nav-link two text-danger'>
                                </form>";
                            } else {
                                echo " <a class='nav-link two text-danger' href='signUp.php'>Register</a>";
                            }
                            ?>
                        </h4>
                    </li>
                    <li class="nav-item">
                        <h4>
                            <?php
                            if (isset($_SESSION["name"])) {
                                echo " <a class='nav-link three text-warning' href='main.php'>Back</a>";
                            } else {
                                echo " <a class='nav-link three text-warning' href='../index.php'>Back</a>";
                            }
                            ?>
                        </h4>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-2">
        <?php
        if (isset($_SESSION['name'])) { ?>
            <?php
            $sql = "SELECT * FROM dictionary_words where word_name = '$searchedWord'and (user_id='{$_SESSION['ids']}' or status='1')";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $name = $row['word_name'];
                    $_SESSION['word'] = $name;
                    $word1 = $_SESSION['word'];
                    $id = $row['word_id'];
                    $_SESSION['word_id'] = $id;
                    $image = $row['image'];
                    $synonyms = $row['synonyms'];
                    $antonyms = $row['antonyms'];
                    $syn = json_decode($synonyms, true);
                    $ant = json_decode($antonyms, true); ?>
                    <div class="row">
                        <div class="col-md-5 mt-3 p-3 rounded shadow-lg" style="background: #1452527a;">
                            <h1 class='text-warning'>WORD : <span><?php echo $name ?></span></h1>
                            <br>
                            <?php echo "<img class=' ps-5 ms-4 mb-2 img-fluid' src='assets/images/$image'>" ?>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5 mt-3 p-5 shadow-lg rounded" style="background: #1452527a;">
                            <h5 class='text-warning'>Synonyms - <span class='text-light'><?php echo implode(", ", $syn) ?></span><span> <a class='btn btn-danger' href='synonym.php?words=<?php echo $word1 ?>'>+</a></span></h5>
                            <br><br>
                            <h5 class='text-warning'>Antonyms - <span class='text-light'><?php echo implode(", ", $ant) ?></span><span> <a class='btn btn-danger' href='antonyms.php?words=<?php echo $word1 ?>'>+</a></span></h5>
                        </div>
                    </div>
            <?php echo "<div>
                <label class='form-label'>
                <h5 class='text-warning'>Add Comments Here</h5>
                </label>
                <form method='post'>
                <textarea class='form-control w-75' required name='comment' placeholder='Enter Your Comments' rows='3'></textarea>
                <input type='submit' name='submit' value='post' class='btn btn-primary mt-3'>
                </form>
                </div>";
                }
            } else if ($search != $_SESSION['words']) {
                header("location:4041.php");
            } else {
                header("location:4041.php");
            }
            ?>
            <h4 class='text-warning'>Comments</h4>
            <div class=" bg-secondary w-auto ps-4 rounded overflow-auto mb-5" style="height: 200px; overflow-y:scroll;">
                <?php
                $sql = "SELECT c.comment,u.name,c.cmd_time FROM dictionary_comments AS c INNER JOIN dictionary_users AS u ON c.user_id = u.id AND c.word_id ='$id' AND (c.user_id='{$_SESSION['ids']}' or c.status=1);";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $user_name = $row['name'];
                        $user_cmt = $row['comment'];
                        $time = $row['cmd_time'];
                        echo "<span class='me-5 text-white fs-4 fw-bolder fst-italic'>$user_name</span>";
                        echo time_elapsed_string($time);
                        echo "<h6 class=' text-warning ms-3 fw-medium'>$user_cmt</h6>";
                    }
                }
                ?>
            </div>
        <?php
        } else { ?>
            <?php
            $sql = "SELECT * FROM dictionary_words where word_name = '$searchedWord' and  status='1'";
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
                    $ant = json_decode($antonyms, true); ?>
                    <div class="row ">
                        <div class="col-md-5 mt-3 p-3 rounded shadow-lg" style="background: #1452527a;">
                            <h1 class='text-warning'>WORD : <span><?php echo $name ?></span></h1>
                            <?php echo " <img class='ps-5  img-fluid' src='assets/images/$image'>" ?>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5 mt-3 p-5 shadow-lg" style="background: #1452527a;">
                            <h5 class='text-warning'>Synonyms - <span class='text-light'><?php echo implode(", ", $syn) ?></span> </h5>
                            <br><br>
                            <h5 class='text-warning'>Antonyms - <span class='text-light'><?php echo implode(", ", $ant) ?></span></h5>
                        </div>
                    </div>
            <?php echo "
        <div>
        <label class='form-label'>
        <h3 class='text-warning'>Add Comments Here</h3>
        </label>
        <form method='post'>
        <textarea class='form-control' name='comment' disabled placeholder='Enter Your Comments' rows='3'></textarea>
        <input type='submit' name='submit' disabled value='post' class='btn btn-primary mt-3'>
        </form>
        </div>";
                }
            } else if ($search != $_SESSION['words']) {
                header("location:404.php");
            } else {
                header("location:404.php");
            }
            ?>
            <h3 class='text-warning'>Comments</h3>
            <div class="bg-secondary w-auto ps-4 overflow-auto" style="height: 200px; overflow-y:scroll;">
                <?php
                $sql1 = "SELECT c.comment,u.name,c.cmd_time FROM dictionary_comments AS c INNER JOIN dictionary_users AS u ON c.user_id = u.id AND c.word_id ='$id' AND c.status = 1;";
                $result1 = $conn->query($sql1);
                if ($result1->num_rows > 0) {
                    while ($row1 = $result1->fetch_assoc()) {
                        $user_name = $row1['name'];
                        $user_cmt = $row1['comment'];
                        $time = $row1['cmd_time'];
                        echo "<span class=' text-white me-5 fs-4 fw-bolder fst-italic'>$user_name</span>";
                        echo time_elapsed_string($time);
                        echo "<h6 class='text-warning ms-3 fw-medium'>$user_cmt</h6> <hr>";
                    }
                }
                ?>
            </div>
        <?php
        }
        ?>
    </div>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
<?php
function time_elapsed_string($datetime, $full = false)
{
    date_default_timezone_set("Asia/Calcutta");
    $date1 = date("Y-m-d h:i:s");
    $now = new DateTime($date1);
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);
    $diff->f = floor($diff->d / 7);
    $diff->d -= $diff->f * 7;
    $string = array(
        'y' => 'year',
        'm' => 'month',
        'f' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }
    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
} ?>
<?php ob_start(); ?>
<?php include("connect.php") ?>

<?php

if (isset($_SESSION["name"])) {

}
else{
    header("location:../index.php");
}

$user = $_SESSION["name"];
$sql = "select * from dictionary_users where name ='$user'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $_SESSION['id1'] = $row['id'];
        $ids = $_SESSION['id1'];
    }
}

if (isset($_POST['submit1'])) {
    header("location:../index.php");
    session_destroy();
}

$message = '';
if ($_POST) {
    if (isset($_POST['submit'])) {
        $arr = array();
        $word = $_POST['word'];
        $word1 = str_replace(' ', '', $word);
        $sql1 = "SELECT word_name from dictionary_words where word_name = '$word1'";
        $result = $conn->query($sql1);
        if ($result->num_rows > 0) {
            $message = 'This word is already exist';
        } else {
            $array = json_encode($arr, true);
            $UploadErrors = array(
                0 => 'There is no error, the file uploaded with success',
                1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
                2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
                3 => 'The uploaded file was only partially uploaded',
                4 => 'No file was uploaded',
                6 => 'Missing a temporary folder',
                7 => 'Failed to write file to disk.',
                8 => 'A PHP extension stopped the file upload.',
            );
            $temp_name = $_FILES['fileName']['tmp_name'];
            $the_file = $_FILES['fileName']['name'];
            $directory = "assets/images";
            $sql = "INSERT INTO dictionary_words(word_name,image,synonyms,antonyms,user_id) VALUES ('$word1','$the_file','$array','$array','$ids')";
            if ($conn->query($sql) == TRUE) {
                if (move_uploaded_file($temp_name, $directory . "/" . $the_file)) {
                    $message = 'success';
                }
            } else {
                $message = 'please fill all details ';
            }
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
    <link rel="stylesheet" href="assets/css/cdn.jsdelivr.net_npm_bootstrap@5.0.2_dist_css_bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body style="background:url(assets/img/china.jpg); background-repeat:no-repeat; background-size:cover;">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand  me-5 pe-5 nas" href="#">
                <h2>ADMIN PANEL</h2>
            </a>
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation ">
                <span class="navbar-toggler-icon "></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item me-5 pe-5">
                        <h4>
                            <a class="nav-link one active text-warning" href="">ADD WORD</a>
                        </h4>
                    </li>
                    <li class="nav-item me-5 pe-5">
                        <h4>
                            <a class="nav-link one text-light" href="admin_syn.php">ADD SYNONYMS/ANTONYMS</a>
                        </h4>
                    </li>
                    <li class="nav-item me-5 pe-5">
                        <h4>
                            <a class="nav-link one text-light" href="adminpage.php">WORDS TABLE</a>
                        </h4>
                    </li>
                    <li class="nav-item me-5 pe-5">
                        <h4>
                            <a class="nav-link one text-light" href="comments.php">COMMENTS TABLE</a>
                        </h4>
                    </li>

                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item me-5 pe-5">
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
    <div class="text-center pt-5">
        <!-- <h4><?php echo $message; ?></h4> -->
    </div>
    <div class="container">
        <div class=" shadow-lg rounded hell1" style="background:#0000008c;">
            <div class="d-grid justify-content-center">
                <h2 class="text-warning mx-auto mb-3">Add Word Here</h2>
                <form method="post" class="text-center" enctype="multipart/form-data">
                    <input type="text" name="word" class="in form-control mb-2" required>
                    <input class="form-control" name="fileName" class="mx-auto" type="file" id="formFileMultiple" multiple>
                    <input type="submit" name="submit" value="Add" class="btn btn-dark mt-3 w-25 mx-auto mb-5">
                </form>
            </div>
            <h4 class=" text-warning text-center"><?php echo $message; ?></h4>
        </div>
    </div>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
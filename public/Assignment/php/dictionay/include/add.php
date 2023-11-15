<?php include("connect.php") ?>

<?php

$user = $_SESSION["name"];
$sql = "select * from dictionary_users where name ='$user'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $_SESSION['id1'] = $row['id'];
        $ids = $_SESSION['id1'];
    }
}

$message = '';
if ($_POST) {
    if (isset($_POST['submit'])) {

        $word = $_POST['word'];
        $word1 = str_replace(' ', '', $word);
        $sql1 = "SELECT word_name from dictionary_words where word_name = '$word1'";
        $result = $conn->query($sql1);
        if ($result->num_rows > 0) {
            $message = 'This word is already exist';
        } 
        else {
            $syn_arr = array();
            $ant_arr = array();
            // $syn = $_POST['syn'];
            // $ant = $_POST['ant'];
            // array_push($syn_arr, $syn);
            // array_push($ant_arr, $ant);
            $syn_array = json_encode($syn_arr, true);
            $ant_array = json_encode($ant_arr, true);
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
            $sql = "INSERT INTO dictionary_words(word_name,image,synonyms,antonyms,user_id) VALUES ('$word1','$the_file','$syn_array','$ant_array','$ids')";
            if ($conn->query($sql) == TRUE) {
                if (move_uploaded_file($temp_name, $directory . "/" . $the_file)) {
                    $message = 'success';
                } else {
                    $conn->connect_error;
                }
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

<body>
    <div class="container">
        <div class=" shadow-lg rounded hell1">
            <div class="d-grid justify-content-center">
                <h2 class="text-warning mx-auto mb-3">Add Word Here</h2>
                <form method="post" class="text-center" enctype="multipart/form-data">
                    <input type="text" name="word" placeholder="Name" class="in form-control mb-2" required>
                    <input class="form-control" name="fileName" class="mx-auto" type="file">
                    <!-- <input type="text" name="syn" placeholder="synonyms" class="in form-control mb-2 mt-2" required>
                    <input type="text" name="ant" placeholder="antonyms" class="in form-control mb-2" required> -->
                    <input type="submit" name="submit" value="Add" class="btn btn-dark mt-3 w-25 mx-auto mb-5">
                </form>
                <!-- <h4><?php echo $message; ?></h4> -->
            </div>
            <h4 class=" text-warning text-center"><?php echo $message; ?></h4>
        </div>
        <div class="mt-5 pt-5">
            <a class="btn btn-danger mt-3 mx-auto" href="main.php">Back</a>
        </div>
    </div>
</body>

</html>
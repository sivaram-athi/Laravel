<?php
if (isset($_POST['submit'])) {
    // echo "<pre>";
    // print_r($_FILES['fileName']);
    // echo "<pre>";

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
    $directory = "uploads";
    if (move_uploaded_file($temp_name, $directory . "/" . $the_file)) {
        $message = "image upload successfully";
    } else {
        $error = $_FILES['fileName']['error'];
        $message = $UploadErrors[$error];
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
</head>

<body class=" container">

    <h2>
        <?php
        if (!empty($UploadErrors)) {
            echo $message;
        } ?>
    </h2>


    <form method="post" enctype="multipart/form-data" class="mt-5 pt-5">
        <div class="mb-3">
            <input type="file" id="" name="fileName">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Upload</button>
    </form>
    <script src="code.jquery.com_jquery-3.7.0.min.js"></script>
</body>

</html>
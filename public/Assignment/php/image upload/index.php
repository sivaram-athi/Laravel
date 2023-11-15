<?php include('db.php') ?>

<?php
$errors ='';
if ($_POST) {
    if (!$_POST["name"]) {
        $errors .= "name field is required </br>";
    }
    if (!$_POST["email"]) {
        $errors .= "email field is required </br>";
    }
    if ($errors != "") {
        $errors = "<div class='alert alert-danger' role='alert'> $errors </div>";
    } 
    else if (isset($_POST['submit'])) {
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
        $error = $_FILES['fileName']['error'];
        $message = $UploadErrors[$error];
        $name = $_POST['name'];
        $email =$_POST['email'];
        $img =$_FILES['fileName']['name'];
        $temp_name =$_FILES['fileName']['tmp_name'];
        $sql = "INSERT INTO lists(fullname,email,images) VALUES('$name','$email','$img')";
        if ($conn->query($sql) == TRUE) {
            move_uploaded_file($temp_name,$img);
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
</head>

<body class="container">
    <h2>
        <?php $message ?>
    </h2>
    <form method="post" enctype="multipart/form-data" class="mt-5 pt-5">
        <div id="error"><?php echo $errors; ?>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="" name="name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="" name="email">
        </div>
        <div class="mb-3">
            <label class="form-label">profile picture:</label>
            <input type="file" id="" name="fileName">
        </div>
        <button type="submit" name="submit" class="btn btn-primary ">Submit</button>
    </form>

    <?php 

     $sql = "select * from lists";

     $result = $conn->query($sql);
     if($result->num_rows >0){
        while($row = $result->fetch_assoc()){
            $name1 = $row['fullname'];
            $img1 =$row['images'];
            echo "
            $name1
            <img src='$img1' > 
            ";
        }
     }

    ?>
    <script src="code.jquery.com_jquery-3.7.0.min.js"></script>
</body>

</html>
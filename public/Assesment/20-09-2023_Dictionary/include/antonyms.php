<?php ob_start(); ?>
<?php include("connect.php") ?>

<?php

if (isset($_SESSION["name"])) {

}
else{
    header("location:../index.php");
}

$id = $_SESSION['word_id'];
$word1 = $_GET['words'];
// echo $id;
$message ='';
if ($_POST) {
    if (isset($_POST['submit'])) {
        $name = $_POST['ant'];
        $sql ="SELECT word_name,antonyms from dictionary_words where word_id ='$id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $array_ant =json_decode($row['antonyms'],true);
                $name1 =$row['word_name'];
            }
        }
        array_push($array_ant,$name);
        $ant_array = json_encode($array_ant,true);
        $sql1 ="UPDATE dictionary_words SET antonyms = '$ant_array' where word_id ='$id'";
        if ($conn->query($sql1) == TRUE) {
            // $message = 'Added successfully';
            header("location:$name1");
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

<body style="background:url(assets/img/1.jpeg); background-repeat:no-repeat; background-size:cover;"> 
    <div class="container">
        <div class=" shadow-lg rounded hell1" style="background:#000000c2;" >
            <div class="d-grid justify-content-center">
                <h2 class="text-warning mx-auto mb-3">Add Antonyms Here</h2>
                <form method="post" class="text-center">
                    <input type="text" name="ant" class="in form-control mb-2" required>
                    <!-- <input class="form-control" class="mx-auto" type="file" id="formFileMultiple" multiple> -->
                    <input type="submit" name="submit" value="Add" class="btn btn-dark mt-3 w-25 mx-auto mb-5">
                </form>
                <!-- <h4><?php echo $message; ?></h4> -->
            </div>
            <h4 class=" text-warning text-center"><?php echo $message; ?></h4>
        </div>
        <div class="mt-5 pt-5">
            <a class="btn btn-danger mt-5 mx-auto" href="<?php echo $word1 ?>">Back</a>
        </div>
    </div>
</body>

</html>
<?php include("connect.php") ?>

<?php
$id = $_SESSION['word_id'];

$message ='';
if ($_POST) {
    if (isset($_POST['submit'])) {
        $name = $_POST['sell'];
        $word = $_POST['word'];
        $word_id = $_POST['word_id'];
        $sql ="SELECT $name from dictionary_words where word_id ='$word_id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $array_ant =json_decode($row[$name],true);
            }
        }
        array_push($array_ant,$word);
        $ant_array = json_encode($array_ant,true);
        $sql1 ="UPDATE dictionary_words SET $name = '$ant_array' where word_id ='$word_id'";
        if ($conn->query($sql1) == TRUE) {
            $message = 'inserted successfully';
        }
        else{
            $message ='please add all inputs';
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
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand  me-5 pe-5 nas" href="#">
                <h2>ADMIN PANEL</h2>
            </a>
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation ">
                <span class="navbar-toggler-icon "></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 me-auto mb-lg-0">
                    <li class="nav-item me-5 pe-5">
                        <h4>
                            <a class="nav-link one text-light" href="admin_add.php">ADD WORD</a>
                        </h4>
                    </li>
                    <li class="nav-item me-5 pe-5">
                        <h4>
                            <a class="nav-link one active text-warning" href="">ADD SYNONYMS/ANTONYMS</a>
                        </h4>
                    </li>
                    <li class="nav-item me-5 pe-5">
                        <h4>
                            <a class="nav-link one active text-light" href="adminpage.php">WORDS TABLE</a>
                        </h4>
                    </li>
                    <li class="nav-item me-5 pe-5">
                        <h4>
                            <a class="nav-link one text-light" href="comments.php">COMMENTS TABLE</a>
                        </h4>
                    </li>

                </ul>
                <ul class="navbar-nav mb-2 ms-auto mb-lg-0">
                    <li class="nav-item me-5 pe-5">
                        <h4>
                            <a class="nav-link two text-danger" href="../index.php">LOGOUT</a>
                        </h4>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class=" shadow-lg rounded hell1">
            <div class="d-grid justify-content-center">
                <h2 class="text-warning mx-auto mb-3">Add Synonyms/Antonyms Here</h2>
                <form method="post" class="text-center">
                    <div>
                        <input type="text" name="word_id" placeholder="Enter Word Id" class="in form-control mb-2" required>
                    </div>
                    <div>
                        <input type="text" name="word" placeholder="Enter The Word" class="in form-control mb-2" required>
                    </div>
                    <div>
                        <select class="form-select" name="sell"  aria-label="Default select example">
                            <option selected>Choose Options</option>
                            <option value="synonyms">Synonyms</option>
                            <option value="antonyms">Antonyms</option>
                        </select>
                    </div>
                    <!-- <input class="form-control mt-2" class="mx-auto" type="file" id="formFileMultiple" multiple> -->
                    <input type="submit" name="submit" value="Add" class="btn btn-dark mt-3 w-25 mx-auto mb-5">
                </form>
            </div>
            <h4 class=" text-warning text-center"><?php echo $message; ?></h4>
        </div>
    </div>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
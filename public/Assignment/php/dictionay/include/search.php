<?php include("connect.php") ?>

<?php
$words = $_SESSION['words'];
$user_id = $_SESSION["ids"];
$word_id =$_SESSION['word_id'];

if($_POST){
    if(isset($_POST['submit'])){
        $comment = $_POST['comment'];
        $word_id =$_SESSION['word_id']; 
        $sql ="INSERT INTO dictionary_comments(comment,word_id,user_id) VALUES ('$comment','$word_id',$user_id)";
        if ($conn->query($sql) == TRUE) {
            
        }
    }
}

if ($_GET) {
    if (isset($_GET['submit1'])) {
        $search = $_GET['search'];
        $_SESSION['sea'] = $search;
        $sql = "SELECT * from dictionary_words where  word_name='$search' and (user_id='$id' or status='1')";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $word = $row['word_name'];
                $_SESSION['word_id'] = $row['word_id'];
                $_SESSION['words'] = $word;
                if($search == $_SESSION['words']){
                    header("location:search.php?search=$search");
                } 
                else{
                    $conn->connect_error;
                }
            }
        }
        else if($search != $_SESSION['words']){
            header("location:4041.php");
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
                    <li class="nav-item me-5">
                        <h4>
                            <a class="nav-link two text-danger" href="../index.php">Logout</a>
                        </h4>
                    </li>
                    <li class="nav-item">
                        <h4>
                            <a class="nav-link three text-warning" href="main.php">Back</a>
                        </h4>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-2">
        <form  class="d-flex">
            <input type="text" name='search' class="form-control w-25 me-4" required>
            <input type="submit" name="submit1" value="Search" class="btn btn-secondary ">
        </form>
        <hr>
        <?php

        $sql = "SELECT * FROM dictionary_words where word_name = '{$_GET['search']}'";
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
                $syn = json_decode($synonyms,true);
                $ant = json_decode($antonyms,true);
                ?>
                <h1 class='text-warning'>WORD : <span><?php echo $name ?></span></h1>
                <hr>
                <?php echo "
                <img class=' img-fluid' src='assets/images/$image'>"
                ?>
                <hr>
                <h5 class='text-warning'>Synonyms - <span class='text-light'><?php echo implode(", ",$syn) ?></span><span> <a class='btn btn-danger' href='synonym.php?words=<?php echo $word1 ?>'>+</a></span></h5>
                <h5 class='text-warning'>Antonyms - <span class='text-light'><?php echo implode(", ",$ant)?></span><span> <a class='btn btn-danger' href='antonyms.php?words=<?php echo $word1 ?>'>+</a></span></h5>
                <?php echo "
                <hr>
                <div class='mb-3'>
                <label class='form-label'>
                <h5 class='text-warning'>-Add Comments Here-</h5>
                </label>
                <form method='post'>
                <textarea class='form-control' required name='comment' placeholder='Enter Your Comments' rows='3'></textarea>
                <input type='submit' name='submit' value='post' class='btn btn-primary mt-3'>
                </form>
                </div>
                <hr>
                <h5 class='text-warning'>-Comments-</h5>
                <hr>
                ";
            }
        }
        $sql = "SELECT c.comment,u.name FROM dictionary_comments AS c INNER JOIN dictionary_users AS u ON c.user_id = u.id AND c.word_id ='$id' AND (c.user_id='$user_id' or c.status=1);";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user_name = $row['name'];
                $user_cmt = $row['comment'];
                echo "
                 <h4 class='text-warning ms-2'>$user_name <span class=' ms-4 text-light'> - [ $user_cmt ]</span></h4>
                ";
            }
        }
        ?>
    </div>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
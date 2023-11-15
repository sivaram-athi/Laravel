<?php ob_start(); ?>
<?php include("connect.php") ?>

<?php

if (isset($_POST['submit1'])) {
    header("location:../index.php");
    session_destroy();
}

if (isset($_SESSION["name"])) {

}
else{
    header("location:../index.php");
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
                            <a class="nav-link one text-light" href="admin_add.php">ADD WORD</a>
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
                            <a class="nav-link one active text-warning" href="">COMMENTS TABLE</a>
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
    <div class="container " style="margin-top: 200px;">
        <div class="row">
            <div class="col">
                <div class="card shadow-lg" style="background:#0000008c;">
                    <div class="card-body" style="height: 400px; overflow-y:scroll;">
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">WORD ID</th>
                                    <th scope="col">COMMENT</th>
                                    <th scope="col">USER</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col" class="text-center">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT c.word_id, c.comment_id, c.comment, u.name,c.status
                        FROM dictionary_users AS u
                        INNER JOIN dictionary_comments AS c ON c.user_id = u.id;";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $word_id = $row['word_id'];
                                        $comment_id = $row['comment_id'];
                                        $comment = $row['comment'];
                                        $user_name = $row['name'];
                                        $status = $row['status'];
                                        echo "<tr>
                    <td><h4>$word_id</h4></td>
                    <td><h4>$comment</h4></td>
                    <td><h4>$user_name</h4></td>
                    <td><h4>$status</h4></td>
                    <td class='text-center'>" ?>
                                <?php
                                        if ($status == 1) {
                                            echo "
                        <button class='btn btn-warning'><a href='cmt_disapprove.php?disaprv=$comment_id' class='text-light text-decoration-none'>DisApprove</a></button>
                        ";
                                        } else {
                                            echo "
                        <button class='btn btn-primary '><a href='cmt_approve.php?aprv=$comment_id' class='text-light text-decoration-none'>Approve</a></button>
                        ";
                                        }
                                        echo "
                        <button class='btn btn-danger '><a href='comment_delete.php?del=$comment_id' class='text-light text-decoration-none'>Delete</a></button>
                    </td>
                    </tr>";
                                    }
                                }
                                // else{
                                //     echo "no result";
                                // }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-header"></div>
                </div>
            </div>
        </div>

    </div>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
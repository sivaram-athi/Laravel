<?php
$error = "";
$success = "";
if ($_POST) {
    if (!$_POST["email"]) {
        $error .= "An email address is required </br>";
    }
    if (!$_POST["subject"]) {
        $error .= "the subject field is required </br>";
    }
    if (!$_POST["content"]) {
        $error .= "the content field is required </br>";
    }
    if ($error != "") {
        $error = "<div class='alert alert-danger' role='alert'>error $error </div>";
    } else {
        $mail = $_POST["email"];
        $subject = $_POST["subject"];
        $content = $_POST["content"];
        if (mail($mail, $subject, $content)) {
            $success = "<div class='alert alert-success' role='alert'> Your message was send </div>";
        } else {
            $error = "<div class='alert alert-danger' role='alert'>your message could not been send </div>";
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
    <link rel="stylesheet" href="">
</head>

<body>
    <form method="post">
        <div class="container">
            <h1>Get in touch</h1>
            <div id="error">
                <?php 
                echo $error;
                echo $success 
                ?>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="subject" class="form-label">Password</label>
                <input type="text" class="form-control" id="subject" name="subject">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">What would you like to ask us?</label>
                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</body>

</html>
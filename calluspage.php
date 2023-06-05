<?php
session_start();

if(!isset($_SESSION['uloggedin']) || $_SESSION['uloggedin']!=true){
    header("Location:login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Call Us</title>
</head>
<body>
    <header>
            <?php
            include ('partials/nav.php');
            ?>
    </header>
    <button class="btn"><a href="ulogout.php">Logout</a></button>
    <h1>Call Us on this Number to book your tickets</h1>
    <h1>Here is the number:+91 8452679251</h1>
    <?php
    include ('partials/footer.php');
    ?>
</body>
</html>
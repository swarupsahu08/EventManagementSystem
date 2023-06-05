<?php
$showAlert=false;
$showError=false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include('partials/dbcon.php');
    $name=$_POST["name"];
    $email=$_POST["email"];
    $message=$_POST["message"];
    $sql="INSERT INTO `review` (`name`, `email`, `message`, `dt`) VALUES ('$name', '$email', '$message', current_timestamp())";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        $showAlert=true;
    }
    else{
        $showError="The review was not sent due to some technical issues";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Event Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <?php
        include('partials/nav.php');
        ?>
    </header>
    <?php
      if($showAlert){
          
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Thank you</strong> for contacting us!we will get back to you in minutes.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        if($showError){
          
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong>'. $showError.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
          }
        ?>
    <main>
        <section id="contact">
            <h1>Contact Us</h1>
            <p>Do you have a question, comment or suggestion? We'd love to hear from you!</p>
            <form action="/projectself/contact.php" method="POST">
                <div>
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div>
                    <label for="message">Message</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                <button type="submit">Send</button>
            </form>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<?php
include('partials/footer.php');
?>
</body>
</html>
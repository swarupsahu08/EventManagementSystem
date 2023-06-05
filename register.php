<?php
$showAlert=false;
$showError=false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/dbcon.php';
	$fname=$_POST["fname"];
    $username=$_POST["username"];
	$email=$_POST["email"];
    $password=$_POST["password"];
    $cpassword=$_POST["cpassword"];
    // $exists=false;

	
	$existsql="SELECT * FROM `users` WHERE username= '$username'";
    $result=mysqli_query($con,$existsql);
    $numExistRows=mysqli_num_rows($result);
    if($numExistRows>0){
      $showError="Username already exist";
      $exists=true;
    }
    else{
      $exists=false;
    if (($password == $cpassword)) {
        $sql="INSERT INTO `users` (`Name`, `username`, `Email`, `password`, `Dt`) VALUES ('$fname', '$username', '$email', '$password', current_timestamp())";
        $result=mysqli_query($con,$sql);
        if ($result) {
            $showAlert=true;
        }
    }
    else {
        $showError="Passwords do not match";
    }
}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Event Management System - Register</title>
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
          <strong>Success!</strong>your account has now created and you can login
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
		<section id="register">
			<h1>Register</h1>
			<form action="/projectself/register.php" method="post">
				<div class="form-group">
					<label for="fname">Full Name</label>
					<input type="text" id="fname" name="fname" required>
				</div>
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" id="username" name="username" required>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" id="email" name="email" required>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" id="password" name="password" required>
				</div>
				<div class="form-group">
					<label for="cpassword">Confirm Password</label>
					<input type="password" id="cpassword" name="cpassword" required>
				</div>
				<button type="submit" class="btn">Register</button>
			</form>
			<p>Already have an account? <a href="login.php">Login now</a></p>
		</section>
	</main>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<?php
include('partials/footer.php');
?>
</body>
</html>

<!-- $sql = "INSERT INTO `users` (`Sno`, `Name`, `username`, `Email`, `password`, `Dt`) VALUES (\'4\', \'Robert Watts\', \'Robert123\', \'Robert123@gmail.com\', \'Robert@123\', current_timestamp());";

INSERT INTO `users` (`Sno`, `Name`, `username`, `Email`, `password`, `Dt`) VALUES ('4', 'Robert Watts', 'Robert123', 'Robert123@gmail.com', 'Robert@123', current_timestamp()); -->
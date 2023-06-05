<?php
$login=false;
$showError=false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/dbcon.php';
    $username=$_POST["username"];
    $password=$_POST["password"];

        $sql="Select * from users where username='$username' AND password='$password'";
        $result=mysqli_query($con,$sql);
        $num=mysqli_num_rows($result);
        if ($num == 1) {
            $login=true;
            session_start();
            $_SESSION['uloggedin'] = true;
            $_SESSION['username'] = $username;
        }

    else {
        $showError="Invalid Credentials";
    }
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Event Management System - Login</title>
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
	if($login){
      
	  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
	  <strong>Success!</strong>You are logged in
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
		<section id="login">
			<h1>Login</h1>
			<form action="/projectself/login.php" method="post">
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" id="username" name="username" required>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" id="password" name="password" required>
				</div>
				<button type="submit" class="btn">Login</button>
			</form>
			<p>Don't have an account? <a href="register.php">Register now</a></p>
		</section>
	</main>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

<?php
include('partials/footer.php');
?>
</body>
</html>
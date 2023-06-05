<?php
$login=false;
$showError=false;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    include('partials/dbcon.php');
    $username=$_POST["username"];
    $password=$_POST["password"];

    $sql="SELECT * FROM `admin` WHERE admin_name='$username' AND admin_password='$password'";
    $result=mysqli_query($con,$sql);
    $num=mysqli_num_rows($result);
    if ($num == 1) {
        $login=true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: admin/dashboard.php");
        // echo "You are loggedin";
    } else {
        $showError="Invalid credentials";
    }
    


}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Admin Login</title>
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
			<h1>Admin Login</h1>
			<form action="/projectself/admin.php" method="post">
				<div class="form-group">
					<label for="username">Admin Username</label>
					<input type="text" id="username" name="username" required>
				</div>
				<div class="form-group">
					<label for="password">Admin Password</label>
					<input type="password" id="password" name="password" required>
				</div>
				<button type="submit" class="btn">Login</button>
			</form>
		</section>
	</main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <?php
    include('partials/footer.php');
    ?>
</body>
</html>
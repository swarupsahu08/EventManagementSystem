<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("Location:../admin.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Event Management System - Admin Page</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
	<header>
        <?php
        include('nav.php');
        ?>
	</header>
	<h1>Welcome <?php echo $_SESSION['username']; ?></h1>
	<button class="btn"><a href="logout.php">Logout</a></button>
	<main>
		<h2>Upcoming Events</h2>
		<section class="event">
		<?php
			include("../partials/dbcon.php");
			$sql="SELECT * FROM `events`";
            $result=mysqli_query($con,$sql);
            $num=mysqli_num_rows($result);
            if($num>0)
            {
				while($row=mysqli_fetch_assoc($result)){
					echo '<h3>'. $row["Eventname"].'</h3>
					<p>Date:'. $row["date"].'</p>
					<p>Time:'. $row["time"].'</p>
					<p>Location:'. $row["location"].'</p>
					<p>Description:'. $row["description"].'</p>';
					echo "<br>";
				}
			}
		?>
		</section>		
	</main>
	<?php
    include('../partials/footer.php');
    ?>
</body>
</html>

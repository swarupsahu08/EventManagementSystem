<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Event Management System</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<header>
        <?php
        include ('partials/nav.php');
        ?>
	</header>
	<main>
		<section id="hero">
			<h1>Welcome to our Event Management System</h1>
			<p>Discover the best events in town and book your tickets now!</p>
			<a href="uevents.php" class="btn">Browse Events</a>
		</section>
		<section id="events">
			<h2>Upcoming Events</h2>
			<ul>
			<?php
			include("partials/dbcon.php");
			$sql="SELECT * FROM `events`";
            $result=mysqli_query($con,$sql);
            $num=mysqli_num_rows($result);
            if($num>0)
            {
                $row=mysqli_fetch_assoc($result);
				echo '<li>
					<div class="event-thumbnail">
						<img src="event.jpg" alt="Event 1">
					</div>
					<div class="event-details">
						<h3>'.$row["Eventname"].'</h3>
						<p>Date:'.$row["date"].'</p>
						<p>'.$row["location"].'</p>
						<a href="calluspage.php" class="btn">Book Tickets</a>
					</div>
				</li>';
				
				$row=mysqli_fetch_assoc($result);
				echo '<li>
					<div class="event-thumbnail">
						<img src="event2.jpg" alt="Event 1">
					</div>
					<div class="event-details">
						<h3>'.$row["Eventname"].'</h3>
						<p>Date:'.$row["date"].'</p>
						<p>'.$row["location"].'</p>
						<a href="calluspage.php" class="btn">Book Tickets</a>
					</div>
				</li>';

				$row=mysqli_fetch_assoc($result);
				echo '<li>
					<div class="event-thumbnail">
						<img src="event3.jpg" alt="Event 1">
					</div>
					<div class="event-details">
						<h3>'.$row["Eventname"].'</h3>
						<p>Date:'.$row["date"].'</p>
						<p>'.$row["location"].'</p>
						<a href="calluspage.php" class="btn">Book Tickets</a>
					</div>
				</li>';
			}
			?>
			</ul>
		</section>
	</main>
<?php
include('partials/footer.php');
?>
</body>
</html>
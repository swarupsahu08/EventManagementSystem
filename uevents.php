<!DOCTYPE html>
<html>
<head>
    <title>Events</title>
    <style>
a {
	color: #337ab7;
	text-decoration: none;
}
header {
	background-color: #fff;
	box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

nav ul {
	display: flex;
	justify-content: flex-end;
	align-items: center;
	padding: 10px 20px;
}

nav li {
	margin: 0 10px;
}

nav a {
	font-weight: bold;
	text-transform: uppercase;
}
body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

header {
    background-color: #333;
    color: #fff;
    padding: 10px;
}

nav ul {
    margin: 0;
    padding: 0;
    list-style-type: none;
}
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

h1 {
    text-align: center;
}

.event-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    padding: 20px;
}

.event-card {
    width: 300px;
    padding: 10px;
    background-color: #f0f0f0;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.event-card img {
    max-width: 100%;
    height: auto;
    border-radius: 5px;
}

.event-card h2 {
    margin-top: 10px;
}

.event-card p {
    margin-top: 5px;
    font-size: 14px;
}

.event-card a {
    display: inline-block;
    margin-top: 10px;
    padding: 5px 10px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 3px;
}

.event-card a:hover {
    background-color: #0056b3;
}

/* Footer Styles */
footer {
	background-color: #333;
	color: #fff;
	text-align: center;
	padding: 20px;
}

	</style>
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body>
<header>
        <?php
        include ('partials/nav.php');
        ?>
	</header>
    <h1>Events</h1>
    <div class="event-container">
    <?php
			include("partials/dbcon.php");
			$sql="SELECT * FROM `events`";
            $result=mysqli_query($con,$sql);
            $num=mysqli_num_rows($result);
            if($num>0)
            {
               $row=mysqli_fetch_assoc($result);

                   echo '<div class="event-card">
                   <img src="event.jpg" alt="Event 1">
                   <h2>'.$row["Eventname"].'</h2>
                   <p>Date: '.$row["date"].'</p>
                   <p>Location: '.$row["location"].'</p>
                   <p>Description:'.$row["description"].'</p>
                   <a href="calluspage.php">Book Tickets</a>
                   </div>';
                }
                $row=mysqli_fetch_assoc($result);

                   echo '<div class="event-card">
                   <img src="event2.jpg" alt="Event 1">
                   <h2>'.$row["Eventname"].'</h2>
                   <p>Date: '.$row["date"].'</p>
                   <p>Location: '.$row["location"].'</p>
                   <p>Description:'.$row["description"].'</p>
                   <a href="calluspage.php">Book Tickets</a>
                   </div>';
                
                $row=mysqli_fetch_assoc($result);
                   echo '<div class="event-card">
                   <img src="event3.jpg" alt="Event 1">
                   <h2>'.$row["Eventname"].'</h2>
                   <p>Date: '.$row["date"].'</p>
                   <p>Location: '.$row["location"].'</p>
                   <p>Description:'.$row["description"].'</p>
                   <a href="calluspage.php">Book Tickets</a>
                   </div>';

                while($row=mysqli_fetch_assoc($result))
               {

                   echo '<div class="event-card">
                   <img src="event3.jpg" alt="Event 1">
                   <h2>'.$row["Eventname"].'</h2>
                   <p>Date: '.$row["date"].'</p>
                   <p>Location: '.$row["location"].'</p>
                   <p>Description:'.$row["description"].'</p>
                   <a href="#">Book Tickets</a>
                   </div>';
                }
            ?>
    </div>
    <?php
include('partials/footer.php');
?>
</body>
</html>

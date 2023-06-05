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
	<title>My Events</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
	<header>
    <?php
    include('nav.php');
    ?>
	</header>
    <button class="btn"><a href="logout.php">Logout</a></button>
    <button class="btn"><a href="invoice_page.php">Invoice</a></button>


	<section id="main">
		<div class="container">
			<?php
			include("../partials/dbcon.php");
			$sql="SELECT * FROM `events`";
            $result=mysqli_query($con,$sql);
            $num=mysqli_num_rows($result);
            if($num>0)
            {
                while($row=mysqli_fetch_assoc($result)){
                    echo'<article id="event-box">
                    <h2>'.$row["Eventname"].'</h2>
                    <p><strong>Location:</strong>'.$row["location"].'</p>
                    <p><strong>Date:</strong>'.$row["date"].'</p>
                    <p><strong>Time:</strong>'.$row["time"].'</p>
                    <a href="edit_e.php" class="btn">Edit</a>
                    <a href="delete_e.php" class="btn">Delete</a>
                    </article>';
                }
                // $row=mysqli_fetch_assoc($result);
                // echo var_dump($row);
                // echo "<br>";
                // $row=mysqli_fetch_assoc($result);
                // echo var_dump($row);
                // echo "<br>";
                // $row=mysqli_fetch_assoc($result);
                // echo var_dump($row);
                // echo "<br>";
            }
            ?>
</div>
</section>

<footer>
<div class="container">
<p>&copy; 2023 Event Management System</p>
</div>
</footer>

</body>
</html>

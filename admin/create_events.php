<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("Location:../admin.php");
    exit;
}
?>
<?php
$showAlert=false;
$showError=false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
include ("../partials/dbcon.php");

  $name=$_POST["name"];
  $date=$_POST["date"];
  $time=$_POST["time"];
  $location=$_POST["location"];
  $description=$_POST["description"];
  $existsql="SELECT * FROM `events` WHERE Eventname= '$name'";
    $result=mysqli_query($con,$existsql);
    $numExistRows=mysqli_num_rows($result);
    if($numExistRows>0){
      $showError="Name already exist";
      $exists=true;
    }
    else{
      $exists=false;
        $sql="INSERT INTO `events` (`Eventname`, `date`, `time`, `location`, `description`) VALUES ('$name', '$date', '$time', '$location', '$description')";
        $result=mysqli_query($con,$sql);
        if ($result) {
            $showAlert=true;
        }
        else{
          $showError="The event was not added to your list";
        }
     }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Create Event</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="style1.css">
</head>
<body>
  <header>
    <?php
    include('nav.php');
    ?>
  </header>
  <button class="btn"><a href="logout.php">Logout</a></button>
  <?php
      if($showAlert){
          echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong>New event added to the list
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

  <div class="container">
    <h1>Create Event</h1>
    <form action="../admin/create_events.php" method="post">
      <label for="name">Event Name:</label>
      <input type="text" id="name" name="name" required>
      
      <label for="date">Date:</label>
      <input type="date" id="date" name="date" required>
      
      <label for="time">Time:</label>
      <input type="time" id="time" name="time" required>
      
      <label for="location">Location:</label>
      <input type="text" id="location" name="location" required>
      
      <label for="description">Description:</label>
      <textarea id="description" name="description"></textarea>
      
      <input type="submit" value="Create Event">
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <?php
      echo "<br>";
    include('../partials/footer.php');
    ?>
    
</body>
</html>

<!-- INSERT INTO `event` (`id`, `topic`, `date`, `streetnumber`, `streetname`, `postalcode`, `locality`, `startTime`, `endTime`) VALUES
(1, 'Topic 1\r\n1234567890', '2020-11-15', 1, 'Street name', '1234', 'Locality', '12:00:00', '15:00:00'),
(2, 'AAAAAAA\r\nBBBBBBB\r\nCCCCCCC\r\nDDDDDDD', '2020-11-30', 999, 'Abcd', 'AA5 FF9', 'Abcd defg', '01:00:00', '20:00:00');

$sql="INSERT INTO `events` (`Eventname`, `date`, `time`, `location`, `description`, `dt`) VALUES ('$name', '$date', '$time', '$location', '$description', current_timestamp())"; -->
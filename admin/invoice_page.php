<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("Location:../admin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Invoice Page</title>
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

  <div class="container">
    <h1>Create Invoice</h1>
    <form action="../admin/invoice.php" method="post">
      <label for="name">Event Name:</label>
      <input type="text" id="name" name="name" required>
      
      <label for="email">Email</label>
      <input type="email" id="email" name="email" required>

      <label for="date">Date:</label>
      <input type="date" id="date" name="date" required>
      
      <label for="time">Time:</label>
      <input type="time" id="time" name="time" required>
      
      <label for="location">Location:</label>
      <input type="text" id="location" name="location" required>

      
      <label for="ticket">Number of Tickets</label>
      <input type="number" id="ticket" name="ticket" required>
      
      <label>Cost of each ticket is RS.300</label>
      
      <input type="submit" value="Create Invoice">
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <?php
      echo "<br>";
    include('../partials/footer.php');
    ?>
</body>
</html>
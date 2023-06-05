<?php
// Include database connection code
include_once '../partials/dbcon.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $id=$_POST["id"];
    $eventname=$_POST["eventname"];
    $location = $_POST["location"];
    $date = $_POST["date"];
    $time=$_POST["time"];
    // Update user details in the database
    $query = "UPDATE `events` SET `Eventname` = '$eventname', `location` = '$location',  `date` = '$date', `time` = '$time' WHERE `events`.`sno` = $id";
    $stmt = mysqli_query($con,$query);
    if ($stmt) {
        echo "Event details updated successfully.";
    } else {
        echo  "Failed to update event details.";
    }
    
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit User Details</title>
    <!-- Include CSS styles -->
    <style>
        /* Style for form container */
        .form-container {
            max-width: 400px;
            margin: auto;
            padding: 20px;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        /* Style for form fields */
        .form-container input[type="text"],
        .form-container input[type="date"],
        .form-container input[type="time"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        /* Style for form buttons */
        .form-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Edit User Details</h2>
        <form action="../admin/edit_e.php" method="post">
            <input type="text" name="id" placeholder="Id" required>
            <input type="text" name="eventname" placeholder="Eventname" required>
            <input type="text" name="location" placeholder="Location"  required>
            <input type="date" name="date" id="date" placeholder="date" required>
            <input type="time" name="time" id="time" placeholder="Time" required>
            <input type="submit" value="Update">
            <!-- <div class="message">

     ?>
            </div> -->
        </form>
    </div>
</body>

</html>
<!-- DELETE FROM `users` WHERE `users`.`Sno` = 7 -->
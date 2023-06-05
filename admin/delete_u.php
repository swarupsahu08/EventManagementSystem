<?php
// Include database connection code
include_once '../partials/dbcon.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $id=$_POST["id"];
    // Delete user details in the database
    $query = "DELETE FROM `users` WHERE `users`.`Sno` = $id";
    $stmt = mysqli_query($con,$query);
    if ($stmt) {
        echo "User details Deleted successfully.";
    } else {
        echo  "Failed to delete user details.";
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
        .form-container input[type="text"] {
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
        <form action="../admin/delete_u.php" method="post">
            <input type="text" name="id" placeholder="id" required>
            <input type="submit" value="Delete">
        </form>
    </div>
</body>

</html>
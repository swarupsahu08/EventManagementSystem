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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <header>
    <?php
        include('nav.php');
    ?>
    </header>
    <button class="btn"><a href="logout.php">Logout</a></button>
    <section id="manage-users">
        <div class="container">
            <h2>Manage Users</h2>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
			include("../partials/dbcon.php");
			$sql="SELECT * FROM `users`";
            $result=mysqli_query($con,$sql);
            $num=mysqli_num_rows($result);
            if($num>0)
            {
                while($row=mysqli_fetch_assoc($result)){
                    echo '<tr>
                        <td>'.$row["Name"].'</td>
                        <td>'.$row["Email"].'</td>
                        <td>'.$row["username"].'</td>
                        <td><a href="edit_u.php" class="ed">Edit</a>| <a class="ed" href="delete_u.php">Delete</a></td>
                    </tr>';
                }
            }
                ?>
                </tbody>
            </table>
        </div>
    </section>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> -->
	<?php
    include('../partials/footer.php');
    ?>

</body>
</html>

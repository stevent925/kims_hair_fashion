<?php include 'database.php'; ?>

<?php
    // Create SELECT Query
    $query = "SELECT * FROM shouts ORDER BY id DESC";
    $shouts = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
</head>
<body>
    <div id="results"></div>
    <a href="/kims_hair_fashion">Back to Form</a>
            <?php
            $sqlget = "SELECT * FROM appointments";
            $sqldata = mysqli_query($conn, $sqlget) or die('error getting');

            echo "<table id='lol' style='color:green; text-align: center;'>";
            echo "<tr><th>First Name</td><th>Last Name</th><th>Email</th><th>Phone Number</th><th>Date</th><th>Notes</th>";

            while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
                echo "<tr><td>";
                echo $row['firstName'];
                echo "</td><td>";
                echo $row['lastName'];
                echo "</td><td>";
                echo $row['email'];
                echo "</td><td>";
                echo $row['phoneNumber'];
                echo "</td><td>";
                echo $row['dateTime'];
                echo "</td><td>";
                echo $row['notes'];
                echo "</td></tr>";
            }
            echo "</table>";
            ?>
</body>
</html>
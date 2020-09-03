<?php include 'database.php'; ?>

<?php
    if(isset($_POST['firstName']) && isset($_POST['lastName'])) {
        $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
        $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
        $dateTime = mysqli_real_escape_string($conn, $_POST['dateTime']);
        $notes = mysqli_real_escape_string($conn, $_POST['notes']);

        $query = "INSERT INTO appointments (firstName, lastName, email, phoneNumber, dateTime, notes)
        VALUES ('$firstName', '$lastName', '$email', '$phoneNumber', '$dateTime', '$notes')";

        if (!mysqli_query($conn, $query)) {
            echo 'Error: ' . mysqli_error($conn);
        } else {
            echo "<tr><td>" . $firstName . "</td><td>" . $lastName . "</td><td>" . $email . "</td><td>" . $phoneNumber . "</td><td>" . $dateTime . "</td><td>" . $notes . "</td></tr>";
        }
    }
?>



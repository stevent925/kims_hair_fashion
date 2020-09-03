<?php
// Connect to MySQL
$conn = mysqli_connect("localhost", "root", "earwax925", "kims_hair_fashion");


if (mysqli_connect_errno()) {
    echo 'Failed to connect: ' . mysqli_connect_errno();
}

?>
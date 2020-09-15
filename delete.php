<?php include 'database.php'; ?>

<?php 

$id =$_GET['id'];

$query = "DELETE FROM appointments WHERE id = '$id'";

mysqli_query($conn, $query) or die(mysqli_error($conn));

header('Location: appointments.php');

?>
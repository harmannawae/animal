<?php 

    $conn = mysqli_connect("localhost", "root", "", "db_myapp");

    if (!$conn) {
        die("Failed to connec to databse " . mysqli_error($conn));
    }

?>
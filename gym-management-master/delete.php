<?php
if (isset($_GET["id"])) {
    $trainer_id = $_GET["id"];

    // Create a database connection (replace with your connection details)
    $conn = mysqli_connect("localhost", "username", "password", "loginsystem");

    // Check if the connection is successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Create an SQL delete statement
    $sql = "DELETE FROM Trainer WHERE Trainer_id = $trainer_id";

    if (mysqli_query($conn, $sql)) {
        echo "Trainer deleted successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<p>Trainer deleted successfully. <a href="trainer-list.php">Go back to the trainer list</a></p>

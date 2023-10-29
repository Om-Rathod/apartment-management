<?php
// Include your database connection code here

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $trainer_id = $_POST["trainer_id"];
    $newName = $_POST["new_name"];
    $newPhone = $_POST["new_phone"];

    // Create a database connection (replace with your connection details)
    $conn = mysqli_connect("localhost", "username", "password", "loginsystem");

    // Check if the connection is successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Create an SQL update statement
    $sql = "UPDATE Trainer SET Name = '$newName', phone = $newPhone WHERE Trainer_id = $trainer_id";

    if (mysqli_query($conn, $sql)) {
        echo "Trainer details updated successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}

if (isset($_GET["id"])) {
    $trainer_id = $_GET["id"];

    // Create a database connection (replace with your connection details)
    $conn = mysqli_connect("localhost", "username", "password", "loginsystem");

    // Check if the connection is successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch the trainer's details for pre-filling the form
    $sql = "SELECT * FROM Trainer WHERE Trainer_id = $trainer_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    // Close the database connection
    mysqli_close($conn);
}
?>

<!-- Create an HTML form to input new trainer details -->
<form method="POST" action="edit-trainer.php">
    <input type="hidden" name="trainer_id" value="<?php echo $trainer_id; ?>">
    <label for="new_name">New Name:</label>
    <input type="text" name="new_name" value="<?php echo $row['Name']; ?>">
    <label for="new_phone">New Phone:</label>
    <input type="text" name="new_phone" value="<?php echo $row['phone']; ?>">
    <input type="submit" value="Edit Trainer">
</form>
